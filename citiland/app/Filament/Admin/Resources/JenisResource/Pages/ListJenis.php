<?php

namespace App\Filament\Admin\Resources\JenisResource\Pages;

use App\Filament\Admin\Resources\JenisResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJenis extends ListRecords
{
    protected static string $resource = JenisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('cetak_laporanJenis') //nama Fungsi yang dipanggil
            ->label('Cetak Laporan Jenis') //label yang ditampilkan di button
            ->icon('heroicon-o-printer')
            ->action(fn() => static::cetakLaporan()) // A99
            ->requiresConfirmation()
            ->modalHeading('Cetak Laporan Jenis')
            ->modalSubheading('Apakah Anda yakin ingin mencetak laporan Jenis?'),
        ];
    }

    public static function cetakLaporan() // A99
    {
        // Ambil data pengguna
        $data = \App\Models\Jenis::all();
        // Load view untuk cetak PDF
        $pdf = \PDF::loadView('laporan.cetakJenis', ['data' => $data]);
        // Unduh file PDF
        return response()->streamDownload(fn() => print($pdf->output()), 'laporan-jenis.pdf');
    }
}
