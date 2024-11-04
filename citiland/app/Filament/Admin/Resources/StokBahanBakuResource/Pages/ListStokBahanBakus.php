<?php

namespace App\Filament\Admin\Resources\StokBahanBakuResource\Pages;

use App\Filament\Admin\Resources\StokBahanBakuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStokBahanBakus extends ListRecords
{
    protected static string $resource = StokBahanBakuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('cetak_laporanStok') //nama Fungsi yang dipanggil
            ->label('Cetak Laporan Stok') //label yang ditampilkan di button
            ->icon('heroicon-o-printer')
            ->action(fn() => static::cetakLaporan()) // A99
            ->requiresConfirmation()
            ->modalHeading('Cetak Laporan Stok')
            ->modalSubheading('Apakah Anda yakin ingin mencetak laporan Stok?'),
        ];
    }
    public static function cetakLaporan() // A99
    {
        // Ambil data pengguna
        $data = \App\Models\StokBahanBaku::all();
        // Load view untuk cetak PDF
        $pdf = \PDF::loadView('laporan.cetakStok', ['data' => $data]);
        // Unduh file PDF
        return response()->streamDownload(fn() => print($pdf->output()), 'laporan-stok.pdf');
    }
}
