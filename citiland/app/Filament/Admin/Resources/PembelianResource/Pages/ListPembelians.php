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
    }

