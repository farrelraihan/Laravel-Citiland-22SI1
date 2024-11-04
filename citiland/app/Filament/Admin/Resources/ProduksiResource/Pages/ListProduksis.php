<?php

namespace App\Filament\Admin\Resources\ProduksiResource\Pages;

use App\Filament\Admin\Resources\ProduksiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProduksis extends ListRecords
{
    protected static string $resource = ProduksiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('cetak_laporanProduksi') //nama Fungsi yang dipanggil
            ->label('Cetak Laporan Produksi') //label yang ditampilkan di button
            ->icon('heroicon-o-printer')
            ->action(fn() => static::cetakLaporan()) // A99
            ->requiresConfirmation()
            ->modalHeading('Cetak Laporan Produksi')
            ->modalSubheading('Apakah Anda yakin ingin mencetak laporan Produksi?'),
        ];
    }
    public static function cetakLaporan() // A99
    {
        // Ambil data pengguna
        $data = \App\Models\Produksi::all();
        // Load view untuk cetak PDF
        $pdf = \PDF::loadView('laporan.cetakProduksi', ['data' => $data]);
        // Unduh file PDF
        return response()->streamDownload(fn() => print($pdf->output()), 'laporan-produksi.pdf');
    }
}
