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

   

}
