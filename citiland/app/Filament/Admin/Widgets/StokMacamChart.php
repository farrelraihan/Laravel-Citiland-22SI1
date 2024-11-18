<?php

namespace App\Filament\Admin\Widgets;

use Illuminate\Support\Facades\DB;
use Filament\Widgets\ChartWidget;

class StokMacamChart extends ChartWidget
{
    protected static ?string $heading = 'Distribusi Bahan Baku';

    protected function getData(): array
    {
        // Mengambil data stok bahan baku dari database
        $data = DB::table('stok_bahan_bakus')
            ->select(
                'NamaBahanBaku',
                DB::raw('SUM(JumlahBahanBaku) as total')
            )
            ->groupBy('NamaBahanBaku')
            ->orderBy('NamaBahanBaku', 'asc')
            ->get();

        // Variabel untuk menyusun data grafik
        $namaBahanBaku = [];
        $totals = [];

        foreach ($data as $row) {
            $namaBahanBaku[] = $row->NamaBahanBaku; // Menambahkan nama bahan baku
            $totals[] = $row->total; // Memasukkan total JumlahBahanBaku untuk setiap nama bahan baku
        }

        // Mengembalikan data dalam format yang dapat diterima Chart.js
        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Bahan Baku',
                    'data' => $totals,
                    'backgroundColor' => [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                    ],
                    'borderColor' => [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                    ],
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $namaBahanBaku, // Label berdasarkan nama bahan baku
            'options' => [
                'responsive' => true, // Membuat grafik responsif
                'maintainAspectRatio' => false, // Memastikan grafik dapat menyesuaikan ukuran box
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}