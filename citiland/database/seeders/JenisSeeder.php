<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jenis; // Assuming you have this model

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisBahanBakuData = [
            [
                'KodeJenisBahanBaku' => 'JBB00001',
                'JenisBahanBaku' => 'Kayu Jati',
            ],
            [
                'KodeJenisBahanBaku' => 'JBB00002',
                'JenisBahanBaku' => 'Semen',
            ],
            [
                'KodeJenisBahanBaku' => 'JBB00003',
                'JenisBahanBaku' => 'Pasir',
            ],
            [
                'KodeJenisBahanBaku' => 'JBB00004',
                'JenisBahanBaku' => 'Batu Bata',
            ],
            [
                'KodeJenisBahanBaku' => 'JBB00005',
                'JenisBahanBaku' => 'Besi Beton',
            ],
            [
                'KodeJenisBahanBaku' => 'JBB00006',
                'JenisBahanBaku' => 'Kawat',
            ],
            [
                'KodeJenisBahanBaku' => 'JBB00007',
                'JenisBahanBaku' => 'Cat Tembok',
            ],
            [
                'KodeJenisBahanBaku' => 'JBB00008',
                'JenisBahanBaku' => 'Paku',
            ],
            [
                'KodeJenisBahanBaku' => 'JBB00009',
                'JenisBahanBaku' => 'Genteng',
            ],
            [
                'KodeJenisBahanBaku' => 'JBB00010',
                'JenisBahanBaku' => 'Keramik',
            ],
        ];

        foreach ($jenisBahanBakuData as $jenis) {
            Jenis::create($jenis);
        }
    }
}