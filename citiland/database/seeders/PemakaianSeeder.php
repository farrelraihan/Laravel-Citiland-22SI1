<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pemakaian; // Assuming you have this model

class PemakaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pemakaianData = [
            [
                'KodePemakaian' => 'PMK00001',
                'KodeJenisBahanBaku' => 'JBB00001', // Referencing Kayu Jati
                'JumlahPemakaian' => '10',
                'UnitBahanBaku' => 'm3',
                'TanggalPemakaian' => '2024-10-11 14:00:00',
            ],
            [
                'KodePemakaian' => 'PMK00002',
                'KodeJenisBahanBaku' => 'JBB00002', // Referencing Semen
                'JumlahPemakaian' => '50',
                'UnitBahanBaku' => 'sak',
                'TanggalPemakaian' => '2024-10-13 09:30:00',
            ],
            [
                'KodePemakaian' => 'PMK00003',
                'KodeJenisBahanBaku' => 'JBB00003', // Referencing Pasir
                'JumlahPemakaian' => '200',
                'UnitBahanBaku' => 'kg',
                'TanggalPemakaian' => '2024-10-16 10:00:00',
            ],
            [
                'KodePemakaian' => 'PMK00004',
                'KodeJenisBahanBaku' => 'JBB00004', // Referencing Batu Bata
                'JumlahPemakaian' => '500',
                'UnitBahanBaku' => 'pcs',
                'TanggalPemakaian' => '2024-10-19 11:00:00',
            ],
            [
                'KodePemakaian' => 'PMK00005',
                'KodeJenisBahanBaku' => 'JBB00005', // Referencing Besi Beton
                'JumlahPemakaian' => '50',
                'UnitBahanBaku' => 'btg',
                'TanggalPemakaian' => '2024-10-21 15:00:00',
            ],
            [
                'KodePemakaian' => 'PMK00006',
                'KodeJenisBahanBaku' => 'JBB00006', // Referencing Kawat
                'JumlahPemakaian' => '30',
                'UnitBahanBaku' => 'kg',
                'TanggalPemakaian' => '2024-10-23 14:15:00',
            ],
            [
                'KodePemakaian' => 'PMK00007',
                'KodeJenisBahanBaku' => 'JBB00007', // Referencing Cat Tembok
                'JumlahPemakaian' => '20',
                'UnitBahanBaku' => 'liter',
                'TanggalPemakaian' => '2024-10-26 11:00:00',
            ],
            [
                'KodePemakaian' => 'PMK00008',
                'KodeJenisBahanBaku' => 'JBB00008', // Referencing Paku
                'JumlahPemakaian' => '25',
                'UnitBahanBaku' => 'kg',
                'TanggalPemakaian' => '2024-10-28 12:30:00',
            ],
            [
                'KodePemakaian' => 'PMK00009',
                'KodeJenisBahanBaku' => 'JBB00009', // Referencing Genteng
                'JumlahPemakaian' => '100',
                'UnitBahanBaku' => 'pcs',
                'TanggalPemakaian' => '2024-10-30 13:45:00',
            ],
            [
                'KodePemakaian' => 'PMK00010',
                'KodeJenisBahanBaku' => 'JBB00010', // Referencing Keramik
                'JumlahPemakaian' => '75',
                'UnitBahanBaku' => 'box',
                'TanggalPemakaian' => '2024-11-01 09:00:00',
            ],
        ];

        foreach ($pemakaianData as $pemakaian) {
            Pemakaian::create($pemakaian);
        }
    }
}
