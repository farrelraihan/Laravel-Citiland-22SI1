<?php

namespace App\Filament\Admin\Resources\PembelianResource\Pages;

use App\Filament\Admin\Resources\PembelianResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPembelians extends ListRecords
{
    protected static string $resource = PembelianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('cetak_laporanPembelian') //nama Fungsi yang dipanggil
            ->label('Cetak Laporan Pembelian') //label yang ditampilkan di button
            ->icon('heroicon-o-printer')
            ->action(fn() => static::cetakLaporan()) // A99
            ->requiresConfirmation()
            ->modalHeading('Cetak Laporan Pembelian')
            ->modalSubheading('Apakah Anda yakin ingin mencetak laporan Pembelian?'),
         
            Actions\Action::make('cetak_analysis') //nama Fungsi yang dipanggil
            ->label('Cetak Analysis Pembelian') //label yang ditampilkan di button
            ->icon('heroicon-o-chart-bar')
            ->action(fn() => static::cetakAnalysis()) // A99
            ->requiresConfirmation()
            ->modalHeading('Cetak Analysis Pembelian')
            ->modalSubheading('Apakah Anda yakin ingin mencetak analysis Pembelian?'),
        ];
    }

    public static function cetakLaporan() // A99
        {
            // Ambil data pengguna
            $data = \App\Models\pembelian::all();
            // Load view untuk cetak PDF
            $pdf = \PDF::loadView('laporan.cetakPembelian', ['data' => $data])
            ->setPaper('a4', 'landscape');  // Set orientation to landscape;
            // Unduh file PDF
            return response()->streamDownload(fn() => print($pdf->output()), 'laporan-pembelian.pdf');
        }

    public static function cetakAnalysis()
    {
    $data = \DB::table('pembelians')
        ->join('suppliers', 'pembelians.kode_supplier', '=', 'suppliers.kode_supplier')
        ->join('jenis', 'pembelians.KodeJenisBahanBaku', '=', 'jenis.KodeJenisBahanBaku')
        ->join('stok_bahan_bakus', 'pembelians.KodeJenisBahanBaku', '=', 'stok_bahan_bakus.KodeJenisBahanBaku')
        ->select(
            'suppliers.nama_supplier',
            'jenis.JenisBahanBaku', // Update this to the correct column name
            \DB::raw('COUNT(pembelians.KodePembelian) as purchase_count'),
            \DB::raw('SUM(pembelians.JumlahPembelian) as total_quantity'),
            \DB::raw('SUM(pembelians.HargaBahanBaku * pembelians.JumlahPembelian) as total_value'),
            \DB::raw('AVG(pembelians.HargaBahanBaku) as avg_price'),
            \DB::raw('DATE_FORMAT(pembelians.TanggalPembelian, "%Y-%m") as purchase_month')
        )
        ->groupBy('suppliers.nama_supplier', 'jenis.JenisBahanBaku', 'purchase_month')
        ->orderBy('purchase_month')
        ->get();

    $pdf = \PDF::loadView('laporan.cetakPurchaseAnalysis', ['data' => $data])
        ->setPaper('a4', 'landscape');
    return response()->streamDownload(fn() => print($pdf->output()), 'laporan-purchase-analysis.pdf');
}
    }

