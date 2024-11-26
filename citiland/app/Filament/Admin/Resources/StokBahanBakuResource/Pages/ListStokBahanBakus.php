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
            Actions\Action::make('cetak_laporanStok')
                ->label('Cetak Laporan Stok')
                ->icon('heroicon-o-printer')
                ->action(fn() => static::cetakLaporan())
                ->requiresConfirmation()
                ->modalHeading('Cetak Laporan Stok')
                ->modalSubheading('Apakah Anda yakin ingin mencetak laporan Stok?'),
           

        ];
    }

    public static function cetakLaporan()
    {
        $data = \App\Models\StokBahanBaku::all();
        $pdf = \PDF::loadView('laporan.cetakStok', ['data' => $data])
        ->setPaper('a4', 'landscape');  // Set orientation to landscape;
        return response()->streamDownload(fn() => print($pdf->output()), 'laporan-stok.pdf');
    }


}
