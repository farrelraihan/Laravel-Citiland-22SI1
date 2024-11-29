<?php

namespace App\Filament\Admin\Resources\SupplierResource\Pages;

use App\Filament\Admin\Resources\SupplierResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuppliers extends ListRecords
{
    protected static string $resource = SupplierResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('cetak_laporanSupplier') //nama Fungsi yang dipanggil
            ->label('Cetak Laporan Supplier') //label yang ditampilkan di button
            ->icon('heroicon-o-printer')
            ->action(fn() => static::cetakLaporan()) // A99
            ->requiresConfirmation()
            ->modalHeading('Cetak Laporan Supplier')
            ->modalSubheading('Apakah Anda yakin ingin mencetak laporan Supplier?'),
            
            Actions\Action::make('cetak_supplierPerformance')
            ->label('Analisis Performa Supplier')
            ->icon('heroicon-o-chart-bar')
            ->action(fn() => static::cetakPerformanceAnalysis())
            ->requiresConfirmation()


        ];
    }

    public static function cetakLaporan() // A99
    {
        // Ambil data pengguna
        $data = \App\Models\Supplier::all();
        // Load view untuk cetak PDF
        $pdf = \PDF::loadView('laporan.cetakSupplier', ['data' => $data]);
        // Unduh file PDF
        return response()->streamDownload(fn() => print($pdf->output()), 'laporan-supplier.pdf');
    }

    public static function cetakPerformanceAnalysis()
{
    $data = \DB::table('suppliers')
    ->select(
        'suppliers.kode_supplier',
        'suppliers.nama_supplier',
        // Purchases
        \DB::raw('(SELECT COUNT(DISTINCT KodePembelian) FROM pembelians WHERE pembelians.kode_supplier = suppliers.kode_supplier) as purchase_count'),
        \DB::raw('(SELECT COALESCE(SUM(JumlahPembelian), 0) FROM pembelians WHERE pembelians.kode_supplier = suppliers.kode_supplier) as total_purchases'),
        \DB::raw('(SELECT COALESCE(SUM(HargaBahanBaku * JumlahPembelian), 0) FROM pembelians WHERE pembelians.kode_supplier = suppliers.kode_supplier) as total_purchase_value'),
        // Returns (Adjusted Queries)
        \DB::raw('(SELECT COUNT(DISTINCT returs.KodeRetur) FROM returs 
                   INNER JOIN pembelians ON returs.KodePembelian = pembelians.KodePembelian 
                   WHERE pembelians.kode_supplier = suppliers.kode_supplier) as return_count'),
        \DB::raw('(SELECT COALESCE(SUM(returs.JumlahBahanBaku), 0) FROM returs
                   INNER JOIN pembelians ON returs.KodePembelian = pembelians.KodePembelian 
                   WHERE pembelians.kode_supplier = suppliers.kode_supplier) as total_returns'),
        \DB::raw('(SELECT COALESCE(SUM(returs.HargaRetur * returs.JumlahBahanBaku), 0) FROM returs 
                   INNER JOIN pembelians ON returs.KodePembelian = pembelians.KodePembelian 
                   WHERE pembelians.kode_supplier = suppliers.kode_supplier) as total_return_value')
    )
    ->get()
    ->map(function($supplier) {
        return [
            'kode_supplier' => $supplier->kode_supplier,
            'nama_supplier' => $supplier->nama_supplier,
            'purchase_count' => $supplier->purchase_count,
            'total_purchases' => $supplier->total_purchases ?? 0,
            'total_purchase_value' => $supplier->total_purchase_value ?? 0,
            'return_count' => $supplier->return_count ?? 0,
            'total_returns' => $supplier->total_returns ?? 0,
            'total_return_value' => $supplier->total_return_value ?? 0,
            'return_rate' => $supplier->total_purchases > 0 ? 
                ($supplier->total_returns / $supplier->total_purchases) * 100 : 0,
            'financial_impact' => $supplier->total_purchase_value > 0 ?
                ($supplier->total_return_value / $supplier->total_purchase_value) * 100 : 0
        ];
    });

        $pdf = \PDF::loadView('laporan.cetakSupplierPerformance', [
            'data' => $data
        ])->setPaper('a4', 'landscape');
    
        return response()->streamDownload(fn() => print($pdf->output()), 'analisis-performa-supplier.pdf');
}


}