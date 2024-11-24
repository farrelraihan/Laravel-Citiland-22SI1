<?php

namespace App\Filament\Admin\Widgets;

use Illuminate\Support\Facades\DB;
use Filament\Widgets\ChartWidget;

class HighestUsageItemsChart extends ChartWidget
{
    protected static ?string $heading = 'Highest Usage Items Each Month';

    protected function getData(): array
    {
        // Mengambil data pemakaian tertinggi setiap bulan dari database
        $data = DB::table('pemakaians')
            ->join('jenis', 'pemakaians.KodeJenisBahanBaku', '=', 'jenis.KodeJenisBahanBaku')
            ->select(
                DB::raw('DATE_FORMAT(TanggalPemakaian, "%Y-%m") as month'),
                'pemakaians.KodeJenisBahanBaku',
                'jenis.JenisBahanBaku',
                DB::raw('MAX(JumlahPemakaian) as max_usage')
            )
            ->groupBy('month', 'pemakaians.KodeJenisBahanBaku', 'jenis.JenisBahanBaku')
            ->orderBy('month', 'asc')
            ->get();

        // Variabel untuk menyusun data grafik
        $months = [];
        $items = [];
        $itemNames = [];
        $usages = [];

        foreach ($data as $row) {
            $months[] = $row->month;
            $items[] = $row->KodeJenisBahanBaku;
            $itemNames[] = $row->JenisBahanBaku;
            $usages[] = $row->max_usage;
        }

        // Mengembalikan data dalam format yang dapat diterima Chart.js
        return [
        'datasets' => [
                [
                    'label' => 'Jumlah Pemakaian Tertinggi',
                    'data' => $usages,
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $months,
            'options' => [
                'plugins' => [
                    'legend' => [
                        'display' => true,
                    ],
                    'tooltip' => [
                        'enabled' => true,
                        'mode' => 'index',
                        'intersect' => false,
                        'callbacks' => [
                            'label' => "function(context) {
                                return itemNames[context.dataIndex] + ': ' + context.formattedValue;
                            }"
                        ]
                    ]
                ],
                'scales' => [
                    'y' => [
                        'beginAtZero' => true,
                        'title' => [
                            'display' => true,
                            'text' => 'Jumlah Pemakaian'
                        ]
                    ],
                    'x' => [
                        'title' => [
                            'display' => true,
                            'text' => 'Bulan'
                        ]
                    ]
                ],
            ],
        ];
    }
    protected function getType(): string
    {
        return 'line';
    }
}