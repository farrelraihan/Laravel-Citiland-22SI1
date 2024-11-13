<?php

namespace App\Filament\Admin\Resources\GudangResource\Pages;

use App\Filament\Admin\Resources\GudangResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGudangs extends ListRecords
{
    protected static string $resource = GudangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('cetak_laporanGudang') //nama Fungsi yang dipanggil
            ->label('Cetak Laporan Gudang') //label yang ditampilkan di button
            ->icon('heroicon-o-printer')
            ->action(fn() => static::cetakLaporan()) // A99
            ->requiresConfirmation()
            ->modalHeading('Cetak Laporan Gudang')
            ->modalSubheading('Apakah Anda yakin ingin mencetak laporan Gudang?'),


            Actions\Action::make('cetakLaporanAnalisisKomprehensif')
            ->label('Cetak Laporan Analisis Komprehensif')
            ->icon('heroicon-o-printer')
            ->action(fn() => static::cetakLaporanAnalisisKomprehensif())
            ->requiresConfirmation()
            ->modalHeading('Cetak Laporan Analisis Komprehensif')
            ->modalSubheading('Apakah Anda yakin ingin mencetak laporan analisis komprehensif?'),
        ];
    }

    public static function cetakLaporan() // A99
    {
        // Ambil data pengguna
        $data = \App\Models\Gudang::all();
        // Load view untuk cetak PDF
        $pdf = \PDF::loadView('laporan.cetakGudang', ['data' => $data]);
        // Unduh file PDF
        return response()->streamDownload(fn() => print($pdf->output()), 'laporan-gudang.pdf');
    }

   public static function cetakLaporanAnalisisKomprehensif()
{
    $data = \DB::table('suppliers')
        ->join('pembelians', 'suppliers.kode_supplier', '=', 'pembelians.kode_supplier')
        ->join('returs', 'suppliers.kode_supplier', '=', 'returs.kode_supplier')
        ->join('stok_bahan_bakus', 'pembelians.KodeJenisBahanBaku', '=', 'stok_bahan_bakus.KodeJenisBahanBaku')
        ->join('pemakaians', 'pembelians.KodeJenisBahanBaku', '=', 'pemakaians.KodeJenisBahanBaku')
        ->select(
            'suppliers.nama_supplier',
            'pembelians.KodeJenisBahanBaku',
            \DB::raw('SUM(pembelians.JumlahPembelian) as total_pembelian'),
            \DB::raw('SUM(pembelians.JumlahPembelian * pembelians.HargaBahanBaku) as total_pembelian_value'),
            \DB::raw('SUM(returs.JumlahBahanBaku) as total_retur'),
            \DB::raw('SUM(returs.JumlahBahanBaku * returs.HargaRetur) as total_retur_value'),
            \DB::raw('SUM(pemakaians.JumlahPemakaian) as total_pemakaian'),
            \DB::raw('AVG(stok_bahan_bakus.JumlahBahanBaku) as avg_stok'),
            \DB::raw('SUM(returs.JumlahBahanBaku) / SUM(pembelians.JumlahPembelian) * 100 as return_rate'),
            \DB::raw('SUM(pemakaians.JumlahPemakaian) / AVG(stok_bahan_bakus.JumlahBahanBaku) as inventory_turnover'),
            \DB::raw('(SUM(pembelians.JumlahPembelian) - SUM(returs.JumlahBahanBaku)) / SUM(pembelians.JumlahPembelian) * 100 as fulfillment_rate')
        )
        ->groupBy('suppliers.nama_supplier', 'pembelians.KodeJenisBahanBaku')
        ->get();

    $pdf = \PDF::loadView('laporan.cetakLaporanAnalisisKomprehensif', ['data' => $data])
    ->setPaper('a4', 'landscape');
    return response()->streamDownload(fn() => print($pdf->output()), 'laporan-analisis-komprehensif.pdf');
}

}
