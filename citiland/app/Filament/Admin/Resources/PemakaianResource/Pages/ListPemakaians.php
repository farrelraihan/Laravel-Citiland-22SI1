<?php

namespace App\Filament\Admin\Resources\PemakaianResource\Pages;

use App\Filament\Admin\Resources\PemakaianResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPemakaians extends ListRecords
{
    protected static string $resource = PemakaianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('cetak_laporanPemakaian') //nama Fungsi yang dipanggil
            ->label('Cetak Laporan Pemakaian') //label yang ditampilkan di button
            ->icon('heroicon-o-printer')
            ->action(fn() => static::cetakLaporan()) // A99
            ->requiresConfirmation()
            ->modalHeading('Cetak Laporan Pemakaian')
            ->modalSubheading('Apakah Anda yakin ingin mencetak laporan Pemakaian?'),
        ];
    }

    public static function cetakLaporan() // A99
    {
        // Ambil data pengguna
        $data = \App\Models\Pemakaian::all();
        // Load view untuk cetak PDF
        $pdf = \PDF::loadView('laporan.cetakPemakaian', ['data' => $data]);
        // Unduh file PDF
        return response()->streamDownload(fn() => print($pdf->output()), 'laporan-pemakaian.pdf');
    }
}
