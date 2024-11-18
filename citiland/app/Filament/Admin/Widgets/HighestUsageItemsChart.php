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
            ->select(
                DB::raw('DATE_FORMAT(TanggalPemakaian, "%Y-%m") as month'),
                'KodeJenisBahanBaku',
                DB::raw('MAX(JumlahPemakaian) as max_usage')
            )
            ->groupBy('month', 'KodeJenisBahanBaku')
            ->orderBy('month', 'asc')
            ->get();

        // Variabel untuk menyusun data grafik
        $months = [];
        $items = [];
        $usages = [];

        foreach ($data as $row) {
            $months[] = $row->month;
            $items[] = $row->KodeJenisBahanBaku;
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
                'responsive' => true,
                'maintainAspectRatio' => false,
                'scales' => [
                    'x' => [
                        'title' => [
                            'display' => true,
                            'text' => 'Bulan'
                        ]
                    ],
                    'y' => [
                        'title' => [
                            'display' => true,
                            'text' => 'Jumlah Pemakaian'
                        ]
                    ]
                ],
                'plugins' => [
                    'tooltip' => [
                        'callbacks' => [
                            'label' => function($tooltipItem) use ($items) {
                                return $items[$tooltipItem->dataIndex] . ': ' . $tooltipItem->formattedValue;
                            }
                        ]
                    ]
                ]
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}