<?php

namespace App\Filament\Admin\Widgets;

use Illuminate\Support\Facades\DB;
use Filament\Widgets\ChartWidget;

class SupplierPerformanceChart extends ChartWidget
{
    protected static ?string $heading = 'Kinerja Supplier';

    protected function getData(): array
    {
        // Mengambil data kinerja supplier dari database
        $data = DB::table('pembelians')
            ->select(
                'kode_supplier',
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('kode_supplier')
            ->orderBy('total', 'desc')
            ->get();

        // Variabel untuk menyusun data grafik
        $suppliers = [];
        $totals = [];

        foreach ($data as $row) {
            $suppliers[] = $row->kode_supplier; // Menambahkan kode supplier
            $totals[] = $row->total; // Memasukkan total pembelian untuk setiap supplier
        }

        // Mengembalikan data dalam format yang dapat diterima Chart.js
        return [
            'datasets' => [
                [
                    'label' => 'Total Pembelian',
                    'data' => $totals,
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $suppliers, // Label berdasarkan kode supplier
            'options' => [
                'responsive' => true, // Membuat grafik responsif
                'maintainAspectRatio' => false, // Memastikan grafik dapat menyesuaikan ukuran box
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}