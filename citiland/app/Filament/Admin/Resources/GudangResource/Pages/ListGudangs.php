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



}
