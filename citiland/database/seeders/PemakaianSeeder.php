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
                'KodeJenisBahanBaku' => 'JBB00001',
                'JumlahPemakaian' => 12,
                'TanggalPemakaian' => '2024-10-11 14:00:00',
            ],
            [
                'KodePemakaian' => 'PMK00002',
                'KodeJenisBahanBaku' => 'JBB00002',
                'JumlahPemakaian' => 13,
                'TanggalPemakaian' => '2024-10-13 09:30:00',
            ],
            [
                'KodePemakaian' => 'PMK00003',
                'KodeJenisBahanBaku' => 'JBB00003',
                'JumlahPemakaian' => 15,
                'TanggalPemakaian' => '2024-10-16 10:00:00',
            ],
            [
                'KodePemakaian' => 'PMK00004',
                'KodeJenisBahanBaku' => 'JBB00004',
                'JumlahPemakaian' => 18,
                'TanggalPemakaian' => '2024-10-19 11:00:00',
            ],
            [
                'KodePemakaian' => 'PMK00005',
                'KodeJenisBahanBaku' => 'JBB00005',
                'JumlahPemakaian' => 16,
                'TanggalPemakaian' => '2024-10-21 15:00:00',
            ],
            [
                'KodePemakaian' => 'PMK00006',
                'KodeJenisBahanBaku' => 'JBB00006',
                'JumlahPemakaian' => 17,
                'TanggalPemakaian' => '2024-10-23 14:15:00',
            ],
            [
                'KodePemakaian' => 'PMK00007',
                'KodeJenisBahanBaku' => 'JBB00007',
                'JumlahPemakaian' => 21,
                'TanggalPemakaian' => '2024-10-26 11:00:00',
            ],
            [
                'KodePemakaian' => 'PMK00008',
                'KodeJenisBahanBaku' => 'JBB00008',
                'JumlahPemakaian' => 22,
                'TanggalPemakaian' => '2024-10-28 12:30:00',
            ],
            [
                'KodePemakaian' => 'PMK00009',
                'KodeJenisBahanBaku' => 'JBB00009',
                'JumlahPemakaian' => 23,
                'TanggalPemakaian' => '2024-10-30 13:45:00',
            ],
            [
                'KodePemakaian' => 'PMK00010',
                'KodeJenisBahanBaku' => 'JBB00010',
                'JumlahPemakaian' => 24,
                'TanggalPemakaian' => '2024-11-01 09:00:00',
            ],
        ];

        foreach ($pemakaianData as $pemakaian) {
            Pemakaian::create($pemakaian);
        }
    }
}
