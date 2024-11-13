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
         
            Actions\Action::make('cetak_laporanSupplier')
            ->label('Cetak Laporan Rincian Supplier')
            ->icon('heroicon-o-printer')
            ->action(fn() => static::cetakLaporanSupplier())
            ->requiresConfirmation()
            ->modalHeading('Cetak Laporan Detail  Supplier')
            ->modalSubheading('Apakah Anda yakin ingin mencetak laporan supplier?'),

            Actions\Action::make('cetak_laporanSupplierReliability')
            ->label('Cetak Laporan Keandalan Supplier')
            ->icon('heroicon-o-printer')
            ->action(fn() => static::cetakLaporanSupplierReliability())
            ->requiresConfirmation()
            ->modalHeading('Cetak Laporan Keandalan Supplier')
            ->modalSubheading('Apakah Anda yakin ingin mencetak laporan keandalan supplier?'),

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

   
    public static function cetakLaporanSupplier()
    {
        $data = \DB::table('pembelians')
            ->join('pemakaians', 'pembelians.KodeJenisBahanBaku', '=', 'pemakaians.KodeJenisBahanBaku')
            ->join('stok_bahan_bakus', 'pembelians.KodeJenisBahanBaku', '=', 'stok_bahan_bakus.KodeJenisBahanBaku')
            ->join('suppliers', 'pembelians.kode_supplier', '=', 'suppliers.kode_supplier')
            ->select(
                'suppliers.nama_supplier',
                \DB::raw('SUM(pembelians.JumlahPembelian) as total_pembelian'),
                \DB::raw('SUM(pemakaians.JumlahPemakaian) as total_pemakaian'),
                \DB::raw('SUM(stok_bahan_bakus.JumlahBahanBaku) as total_stok')
            )
            ->groupBy('suppliers.nama_supplier')
            ->get();
    
        $pdf = \PDF::loadView('laporan.cetakLaporanSupplier', ['data' => $data]);
        return response()->streamDownload(fn() => print($pdf->output()), 'laporan-detail-supplier.pdf');
    }

    public static function cetakLaporanSupplierReliability()
    {
        $data = \DB::table('suppliers')
            ->join('pembelians', 'suppliers.kode_supplier', '=', 'pembelians.kode_supplier')
            ->leftJoin('returs', 'suppliers.kode_supplier', '=', 'returs.kode_supplier')
            ->select(
                'suppliers.nama_supplier',
                \DB::raw('COUNT(pembelians.KodePembelian) as total_orders'),
                \DB::raw('COUNT(returs.KodeRetur) as total_returns'),
                \DB::raw('IFNULL((COUNT(returs.KodeRetur) / COUNT(pembelians.KodePembelian)) * 100, 0) as return_rate')
            )
            ->groupBy('suppliers.nama_supplier')
            ->get();
        $pdf = \PDF::loadView('laporan.cetakLaporanSupplierReliability', ['data' => $data]);
        return response()->streamDownload(fn() => print($pdf->output()), 'laporan-keandalan-supplier.pdf');
    }


}