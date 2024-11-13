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
           
            Actions\Action::make('cetak_laporanInventoryTurnover')
                ->label('Cetak Laporan Perputaran Inventaris')
                ->icon('heroicon-o-printer')
                ->action(fn() => static::cetakLaporanInventoryTurnover())
                ->requiresConfirmation()
                ->modalHeading('Cetak Laporan Perputaran Inventaris')
                ->modalSubheading('Apakah Anda yakin ingin mencetak laporan perputaran inventaris?'),
        ];
    }

    public static function cetakLaporan()
    {
        $data = \App\Models\StokBahanBaku::all();
        $pdf = \PDF::loadView('laporan.cetakStok', ['data' => $data])
        ->setPaper('a4', 'landscape');  // Set orientation to landscape;
        return response()->streamDownload(fn() => print($pdf->output()), 'laporan-stok.pdf');
    }

    public static function cetakLaporanInventoryTurnover()
    {
        $data = \DB::table('stok_bahan_bakus')
            ->join('pembelians', 'stok_bahan_bakus.KodeJenisBahanBaku', '=', 'pembelians.KodeJenisBahanBaku')
            ->join('pemakaians', 'stok_bahan_bakus.KodeJenisBahanBaku', '=', 'pemakaians.KodeJenisBahanBaku')
            ->select(
                'stok_bahan_bakus.NamaBahanBaku',
                \DB::raw('SUM(pembelians.JumlahPembelian) as total_pembelian'),
                \DB::raw('SUM(pemakaians.JumlahPemakaian) as total_pemakaian'),
                \DB::raw('SUM(stok_bahan_bakus.JumlahBahanBaku) as total_stok')
            )
            ->groupBy('stok_bahan_bakus.NamaBahanBaku')
            ->get();
        $pdf = \PDF::loadView('laporan.cetakLaporanInventoryTurnover', ['data' => $data])
        ->setPaper('a4', 'landscape');  // Set orientation to landscape;
        return response()->streamDownload(fn() => print($pdf->output()), 'laporan-perputaran-inventaris.pdf');
    }
}
