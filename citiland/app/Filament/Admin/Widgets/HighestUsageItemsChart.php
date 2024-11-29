<?php

namespace App\Filament\Admin\Widgets;

use Illuminate\Support\Facades\DB;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Js;

class HighestUsageItemsChart extends ChartWidget
{
    protected static ?string $heading = 'Tren Bulanan Penggunaan Item';

    protected function getData(): array
    {
        // Get all months for the current year
        $months = [];
        $monthLabels = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthNum = str_pad($i, 2, '0', STR_PAD_LEFT);
            $monthKey = date('Y') . '-' . $monthNum;
            $months[$monthKey] = [
                'total_usage' => 0,
                'most_used_item' => 'No data',
                'usage' => 0,
            ];
            $monthLabels[] = $monthKey;
        }

        // Fetch usage data
        $data = DB::table('pemakaians')
            ->join('jenis', 'pemakaians.KodeJenisBahanBaku', '=', 'jenis.KodeJenisBahanBaku')
            ->select(
                DB::raw('DATE_FORMAT(TanggalPemakaian, "%Y-%m") as month'),
                'jenis.JenisBahanBaku',
                DB::raw('SUM(JumlahPemakaian) as total_usage')
            )
            ->whereYear('TanggalPemakaian', date('Y'))
            ->groupBy('month', 'jenis.JenisBahanBaku')
            ->orderBy('month', 'asc')
            ->get();

        // Process the data
        foreach ($data as $row) {
            if (isset($months[$row->month])) {
                $months[$row->month]['total_usage'] += $row->total_usage;

                if ($row->total_usage > $months[$row->month]['usage']) {
                    $months[$row->month]['usage'] = $row->total_usage;
                    $months[$row->month]['most_used_item'] = $row->JenisBahanBaku;
                }
            }
        }

        // Prepare data for the chart
        $totalUsages = [];
        $tooltips = [];
        foreach ($months as $monthData) {
            $totalUsages[] = $monthData['total_usage'];
            if ($monthData['most_used_item'] !== 'No data') {
                $tooltips[] = 'Most used item: ' . $monthData['most_used_item'] . ' (' . $monthData['usage'] . ')';
            } else {
                $tooltips[] = 'No data';
            }
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total Item Usage',
                    'data' => $totalUsages,
                    'backgroundColor' => 'rgba(75, 192, 192, 0.4)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 2,
                    'tension' => 0.3,
                    'fill' => false,
                ],
            ],
            'labels' => $monthLabels,
            'options' => [
                'plugins' => [
                    'tooltip' => [
                        'callbacks' => [
                            'label' => Js::from("
                                function(context) {
                                    var tooltips = " . json_encode($tooltips) . ";
                                    var index = context.dataIndex;
                                    return tooltips[index];
                                }
                            "),
                        ],
                    ],
                ],
                'scales' => [
                    'y' => [
                        'beginAtZero' => true,
                        'title' => [
                            'display' => true,
                            'text' => 'Total Usage',
                        ],
                    ],
                    'x' => [
                        'title' => [
                            'display' => true,
                            'text' => 'Month',
                        ],
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}