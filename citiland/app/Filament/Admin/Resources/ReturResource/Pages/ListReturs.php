<?php

namespace App\Filament\Admin\Resources\ReturResource\Pages;

use App\Filament\Admin\Resources\ReturResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReturs extends ListRecords
{
    protected static string $resource = ReturResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('cetakLaporan') //nama Fungsi yang dipanggil
            ->label('Cetak Laporan Retur') //label yang ditampilkan di button
            ->icon('heroicon-o-printer')
            ->action(fn() => static::cetakLaporan()) // A99
            ->requiresConfirmation()
            ->modalHeading('Cetak Laporan Retur')
            ->modalSubheading('Apakah Anda yakin ingin mencetak laporan Retur?'),

            Actions\Action::make('cetakLaporanRetur')
            ->label('Cetak Laporan Detail Retur')
            ->icon('heroicon-o-printer')
            ->action(fn() => static::cetakLaporanRetur())
            ->requiresConfirmation()
            ->modalHeading('Cetak Laporan Retur')
            ->modalSubheading('Apakah Anda yakin ingin mencetak laporan retur?'),

        ];
    }
            
    public static function cetakLaporan() // A99
    {
        // Ambil data pengguna
        $data = \App\Models\Retur::all();
        // Load view untuk cetak PDF
        $pdf = \PDF::loadView('laporan.cetakRetur', ['data' => $data])
        ->setPaper('a4', 'landscape');  // Set orientation to landscape;
        // Unduh file PDF
        return response()->streamDownload(fn() => print($pdf->output()), 'laporan-retur.pdf');
    }

   
    public static function cetakLaporanRetur()
    {
        $data = \DB::table('returs')
            ->join('pembelians', 'returs.KodeJenisBahanBaku', '=', 'pembelians.KodeJenisBahanBaku')
            ->join('stok_bahan_bakus', 'returs.KodeJenisBahanBaku', '=', 'stok_bahan_bakus.KodeJenisBahanBaku')
            ->join('suppliers', 'returs.kode_supplier', '=', 'suppliers.kode_supplier')
            ->select(
                'suppliers.nama_supplier',
                'returs.KodeJenisBahanBaku',
                \DB::raw('SUM(returs.JumlahBahanBaku) as total_retur'),
                \DB::raw('SUM(pembelians.JumlahPembelian) as total_pembelian'),
                \DB::raw('SUM(stok_bahan_bakus.JumlahBahanBaku) as total_stok'),
                \DB::raw('SUM(returs.JumlahBahanBaku * returs.HargaRetur) as total_retur_value'),
                \DB::raw('AVG(returs.JumlahBahanBaku) as avg_retur_quantity'),
                \DB::raw('SUM(returs.JumlahBahanBaku) / SUM(pembelians.JumlahPembelian) * 100 as return_rate')
            )
            ->groupBy('suppliers.nama_supplier', 'returs.KodeJenisBahanBaku')
            ->get();
    
        $pdf = \PDF::loadView('laporan.cetakLaporanRetur', ['data' => $data])
        ->setPaper('a4', 'landscape');  // Set orientation to landscape;
        return response()->streamDownload(fn() => print($pdf->output()), 'laporan-Detail-retur.pdf');
    }
}
