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

            Actions\Action::make('cetakReturnAnalysis')
                ->label('Cetak Analisis Retur')
                ->icon('heroicon-o-document-text')
                ->action(fn() => static::cetakReturnAnalysis())
                ->requiresConfirmation()
                ->modalHeading('Cetak Analisis Retur')
                ->modalSubheading('Apakah Anda yakin ingin mencetak analisis Retur?'),


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

    public static function cetakReturnAnalysis()
    {
    $purchases = \DB::table('pembelians')
        ->select(
            \DB::raw('DATE_FORMAT(TanggalPembelian, "%Y-%m") as month'),
            \DB::raw('SUM(JumlahPembelian) as total_purchases')
        )
        ->whereBetween('TanggalPembelian', [now()->subMonths(12), now()])
        ->groupBy('month')
        ->get()
        ->keyBy('month');

    // Get total returns per month
    $returns = \DB::table('returs')
        ->select(
            \DB::raw('DATE_FORMAT(TanggalRetur, "%Y-%m") as month'),
            \DB::raw('SUM(JumlahBahanBaku) as total_returns'),
            \DB::raw('SUM(HargaRetur * JumlahBahanBaku) as total_return_value')
        )
        ->whereBetween('TanggalRetur', [now()->subMonths(12), now()])
        ->groupBy('month')
        ->get()
        ->keyBy('month');

    // Combine purchases and returns data
    $months = collect();
    for ($i = 0; $i < 12; $i++) {
        $month = now()->subMonths(11 - $i)->format('Y-m');
        $total_purchases = isset($purchases[$month]) ? $purchases[$month]->total_purchases : 0;
        $total_returns = isset($returns[$month]) ? $returns[$month]->total_returns : 0;
        $total_return_value = isset($returns[$month]) ? $returns[$month]->total_return_value : 0;
        $return_rate = $total_purchases > 0 ? ($total_returns / $total_purchases) * 100 : 0;

        $months->push([
            'month' => $month,
            'total_purchases' => $total_purchases,
            'total_returns' => $total_returns,
            'total_return_value' => $total_return_value,
            'return_rate' => $return_rate
        ]);
    }

    $pdf = \PDF::loadView('laporan.cetakReturnAnalysis', [
        'monthlyTrends' => $months
    ])->setPaper('a4', 'landscape');

    return response()->streamDownload(fn() => print($pdf->output()), 'laporan-return-analysis.pdf');
}
}