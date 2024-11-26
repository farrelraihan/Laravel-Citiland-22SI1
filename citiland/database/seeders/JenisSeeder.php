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
                'UnitBahanBaku' => 'm3',
            ],
            [
                'KodeJenisBahanBaku' => 'JBB00002',
                'JenisBahanBaku' => 'Semen',
                'UnitBahanBaku' => 'kg',
            ],
            [
                'KodeJenisBahanBaku' => 'JBB00003',
                'JenisBahanBaku' => 'Pasir',
                'UnitBahanBaku' => 'kg',
            ],
            [
                'KodeJenisBahanBaku' => 'JBB00004',
                'JenisBahanBaku' => 'Batu Bata',
                'UnitBahanBaku' => 'kg',
            ],
            [
                'KodeJenisBahanBaku' => 'JBB00005',
                'JenisBahanBaku' => 'Besi Beton',
                'UnitBahanBaku' => 'kg',
            ],
            [
                'KodeJenisBahanBaku' => 'JBB00006',
                'JenisBahanBaku' => 'Kawat',
                'UnitBahanBaku' => 'kg',
            ],
            [
                'KodeJenisBahanBaku' => 'JBB00007',
                'JenisBahanBaku' => 'Cat Tembok',
                'UnitBahanBaku' => 'l',
            ],
            [
                'KodeJenisBahanBaku' => 'JBB00008',
                'JenisBahanBaku' => 'Paku',
                'UnitBahanBaku' => 'kg',
            ],
            [
                'KodeJenisBahanBaku' => 'JBB00009',
                'JenisBahanBaku' => 'Genteng',
                'UnitBahanBaku' => 'kg',
            ],
            [
                'KodeJenisBahanBaku' => 'JBB00010',
                'JenisBahanBaku' => 'Keramik',
                'UnitBahanBaku' => 'm3',
            ],
        ];

        foreach ($jenisBahanBakuData as $jenis) {
            Jenis::create($jenis);
        }
    }
}