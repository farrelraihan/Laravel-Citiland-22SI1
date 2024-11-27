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
           
                Actions\Action::make('cetak_stokanalysis')
                ->label('Cetak Stok Analysis')
                ->icon('heroicon-o-printer')
                ->action(fn() => static::cetakStokAnalysis())
                ->requiresConfirmation()
                ->modalHeading('Cetak Stok Analysis')
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

    public static function cetakStokAnalysis()
{
    $data = \DB::table('stok_bahan_bakus')
        ->join('jenis', 'stok_bahan_bakus.KodeJenisBahanBaku', '=', 'jenis.KodeJenisBahanBaku')
        ->leftJoin('pemakaians', 'stok_bahan_bakus.KodeJenisBahanBaku', '=', 'pemakaians.KodeJenisBahanBaku')
        ->select(
            'stok_bahan_bakus.KodeBahanBaku',
            'stok_bahan_bakus.NamaBahanBaku',
            'jenis.JenisBahanBaku',
            'stok_bahan_bakus.JumlahBahanBaku as current_stock',
            \DB::raw('COUNT(DISTINCT pemakaians.KodePemakaian) as usage_count'),
            \DB::raw('COALESCE(SUM(pemakaians.JumlahPemakaian), 0) as total_usage'),
            \DB::raw('COALESCE(AVG(pemakaians.JumlahPemakaian), 0) as avg_usage_per_transaction')
        )
        ->groupBy(
            'stok_bahan_bakus.KodeBahanBaku',
            'stok_bahan_bakus.NamaBahanBaku',
            'jenis.JenisBahanBaku',
            'stok_bahan_bakus.JumlahBahanBaku'
        )
        ->get();

    $pdf = \PDF::loadView('laporan.cetakStokAnalysis', ['data' => $data])
        ->setPaper('a4', 'landscape');
    return response()->streamDownload(fn() => print($pdf->output()), 'analisis-stok.pdf');
}


}
