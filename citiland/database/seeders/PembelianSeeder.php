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
        $pembelianData = 
        [
            [
                'KodePembelian' => 'PBL00001',
                'KodeJenisBahanBaku' => 'JBB00005',
                'JumlahPembelian' => 900,
                'kode_supplier' => 'SUP00005',
                'HargaBahanBaku' => 7500000,
                'TanggalPembelian' => '2024-01-20 13:00:00',
            ],
            [
                'KodePembelian' => 'PBL00002',
                'KodeJenisBahanBaku' => 'JBB00006',
                'JumlahPembelian' => 900,
                'kode_supplier' => 'SUP00006',
                'HargaBahanBaku' => 1750000,
                'TanggalPembelian' => '2024-02-22 15:15:00',
            ],
            [
                'KodePembelian' => 'PBL00003',
                'KodeJenisBahanBaku' => 'JBB00007',
                'JumlahPembelian' => 900,
                'kode_supplier' => 'SUP00007',
                'HargaBahanBaku' => 2000000,
                'TanggalPembelian' => '2024-03-25 10:00:00',
            ],
            [
                'KodePembelian' => 'PBL00004',
                'KodeJenisBahanBaku' => 'JBB00008',
                'JumlahPembelian' => 900,
                'kode_supplier' => 'SUP00008',
                'HargaBahanBaku' => 900000,
                'TanggalPembelian' => '2024-04-27 14:45:00',
            ],
            [
                'KodePembelian' => 'PBL00005',
                'KodeJenisBahanBaku' => 'JBB00009',
                'JumlahPembelian' => 900,
                'kode_supplier' => 'SUP00009',
                'HargaBahanBaku' => 1250000,
                'TanggalPembelian' => '2024-05-29 12:30:00',
            ],
            [
                'KodePembelian' => 'PBL00006',
                'KodeJenisBahanBaku' => 'JBB00010',
                'JumlahPembelian' => 900,
                'kode_supplier' => 'SUP00010',
                'HargaBahanBaku' => 13500000,
                'TanggalPembelian' => '2024-06-30 08:45:00',
            ],
            [
                'KodePembelian' => 'PBL00007',
                'KodeJenisBahanBaku' => 'JBB00004', // Start decrementing
                'JumlahPembelian' => 900,
                'kode_supplier' => 'SUP00004',
                'HargaBahanBaku' => 6500000,
                'TanggalPembelian' => '2024-07-01 09:00:00',
            ],
            [
                'KodePembelian' => 'PBL00008',
                'KodeJenisBahanBaku' => 'JBB00003',
                'JumlahPembelian' => 900,
                'kode_supplier' => 'SUP00003',
                'HargaBahanBaku' => 1800000,
                'TanggalPembelian' => '2024-08-02 10:15:00',
            ],
            [
                'KodePembelian' => 'PBL00009',
                'KodeJenisBahanBaku' => 'JBB00002',
                'JumlahPembelian' => 900,
                'kode_supplier' => 'SUP00002',
                'HargaBahanBaku' => 1950000,
                'TanggalPembelian' => '2024-09-03 11:30:00',
            ],
            [
                'KodePembelian' => 'PBL00010',
                'KodeJenisBahanBaku' => 'JBB00001', // End decrementing
                'JumlahPembelian' => 900,
                'kode_supplier' => 'SUP00001',
                'HargaBahanBaku' => 850000,
                'TanggalPembelian' => '2024-10-04 13:45:00',
            ],
        ];
        
            

        foreach ($pembelianData as $pembelian) {
            Pembelian::create($pembelian);
        }
    }
}
