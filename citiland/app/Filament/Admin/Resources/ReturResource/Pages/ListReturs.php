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
        $data = \DB::table('returs')
        ->join('suppliers', 'returs.kode_supplier', '=', 'suppliers.kode_supplier')
        ->join('jenis', 'returs.KodeJenisBahanBaku', '=', 'jenis.KodeJenisBahanBaku')
        ->leftJoin('pembelians', function($join) {
            $join->on('returs.KodeJenisBahanBaku', '=', 'pembelians.KodeJenisBahanBaku')
                 ->on('returs.kode_supplier', '=', 'pembelians.kode_supplier');
        })
        ->select(
            'suppliers.nama_supplier',
            'jenis.JenisBahanBaku',
            'returs.KodeJenisBahanBaku',
            \DB::raw('SUM(returs.JumlahBahanBaku) as total_returned'),
            \DB::raw('SUM(returs.HargaRetur * returs.JumlahBahanBaku) as total_return_value'),
            \DB::raw('SUM(pembelians.JumlahPembelian) as total_purchases'),
            \DB::raw('DATE_FORMAT(returs.TanggalRetur, "%Y-%m") as return_month')
        )
        ->whereBetween('returs.TanggalRetur', [now()->subMonths(12), now()])
        ->groupBy('suppliers.nama_supplier', 'jenis.JenisBahanBaku', 'returs.KodeJenisBahanBaku', 'return_month')
        ->orderBy('total_return_value', 'desc')
        ->get();

    $monthlyTrends = $data->groupBy('return_month')
        ->map(function($group) {
            $total_purchases = $group->sum('total_purchases');
            return [
                'month' => $group->first()->return_month,
                'total_returns' => $group->sum('total_returned'),
                'total_value' => $group->sum('total_return_value'),
                'total_purchases' => $total_purchases,
                'return_rate' => $total_purchases > 0 ? ($group->sum('total_returned') / $total_purchases) * 100 : 0
            ];
        })->values();

    $pdf = \PDF::loadView('laporan.cetakReturnAnalysis', [
        'monthlyTrends' => $monthlyTrends
    ])->setPaper('a4', 'landscape');

    return response()->streamDownload(fn() => print($pdf->output()), 'laporan-return-analysis.pdf');
}
}