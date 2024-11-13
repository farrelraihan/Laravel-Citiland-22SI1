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
            Actions\Action::make('cetak_laporanProduksi')
                ->label('Cetak Laporan Produksi')
                ->icon('heroicon-o-printer')
                ->action(fn() => static::cetakLaporan())
                ->requiresConfirmation()
                ->modalHeading('Cetak Laporan Produksi')
                ->modalSubheading('Apakah Anda yakin ingin mencetak laporan Produksi?'),


        ];
    }

    public static function cetakLaporan()
    {
        $data = \App\Models\Produksi::all();
        $pdf = \PDF::loadView('laporan.cetakProduksi', ['data' => $data]);
        return response()->streamDownload(fn() => print($pdf->output()), 'laporan-produksi.pdf');
    }


}
