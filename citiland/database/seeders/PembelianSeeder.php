<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pembelian;

class PembelianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pembelianData = [
            [
                'KodePembelian' => 'PBL00001',
                'KodeJenisBahanBaku' => 'JBB00005',
                'JumlahPembelian' => 900,
                'kode_supplier' => 'SUP00005',
                'HargaBahanBaku' => 7500000,
                'TanggalPembelian' => '2024-10-20 13:00:00',
            ],
            [
                'KodePembelian' => 'PBL00002',
                'KodeJenisBahanBaku' => 'JBB00006',
                'JumlahPembelian' => 900,
                'kode_supplier' => 'SUP00006',
                'HargaBahanBaku' => 1750000,
                'TanggalPembelian' => '2024-10-22 15:15:00',
            ],
            [
                'KodePembelian' => 'PBL00003',
                'KodeJenisBahanBaku' => 'JBB00007',
                'JumlahPembelian' => 900,
                'kode_supplier' => 'SUP00007',
                'HargaBahanBaku' => 2000000,
                'TanggalPembelian' => '2024-10-25 10:00:00',
            ],
            [
                'KodePembelian' => 'PBL00004',
                'KodeJenisBahanBaku' => 'JBB00008',
                'JumlahPembelian' => 900,
                'kode_supplier' => 'SUP00008',
                'HargaBahanBaku' => 900000,
                'TanggalPembelian' => '2024-10-27 14:45:00',
            ],
            [
                'KodePembelian' => 'PBL00005',
                'KodeJenisBahanBaku' => 'JBB00009',
                'JumlahPembelian' => 900,
                'kode_supplier' => 'SUP00009',
                'HargaBahanBaku' => 1250000,
                'TanggalPembelian' => '2021-10-29 12:30:00',
            ],
            [
                'KodePembelian' => 'PBL00006',
                'KodeJenisBahanBaku' => 'JBB00010',
                'JumlahPembelian' => 900,
                'kode_supplier' => 'SUP00010',
                'HargaBahanBaku' => 13500000,
                'TanggalPembelian' => '2023-10-31 08:45:00',
            ],
        ];

        foreach ($pembelianData as $pembelian) {
            Pembelian::create($pembelian);
        }
    }
}
