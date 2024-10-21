<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pembelian; // Assuming you have this model

class PembelianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pembelianData = [
            // [
            //     'KodePembelian' => 'PBL00001',
            //     'KodeJenisBahanBaku' => 'JBB00001', // Referencing Kayu Jati
            //     'JumlahPembelian' => '50',
            //     'UnitBahanBaku' => 'm3',
            //     'kode_supplier' => 'SUP00001', // Referencing PT Maju Jaya
            //     'HargaBahanBaku' => '75000000', // 50 m3 * 1,500,000
            //     'TanggalPembelian' => '2024-10-10 10:00:00',
            // ],
            // [
            //     'KodePembelian' => 'PBL00002',
            //     'KodeJenisBahanBaku' => 'JBB00002', // Referencing Semen
            //     'JumlahPembelian' => '200',
            //     'UnitBahanBaku' => 'sak',
            //     'kode_supplier' => 'SUP00002', // Referencing CV Sumber Makmur
            //     'HargaBahanBaku' => '12000000', // 200 sak * 60,000
            //     'TanggalPembelian' => '2024-10-12 14:30:00',
            // ],
            // [
            //     'KodePembelian' => 'PBL00003',
            //     'KodeJenisBahanBaku' => 'JBB00003', // Referencing Pasir
            //     'JumlahPembelian' => '500',
            //     'UnitBahanBaku' => 'kg',
            //     'kode_supplier' => 'SUP00003', // Referencing UD Berkah Abadi
            //     'HargaBahanBaku' => '1000000', // 500 kg * 2,000
            //     'TanggalPembelian' => '2024-10-15 11:45:00',
            // ],
            // [
            //     'KodePembelian' => 'PBL00004',
            //     'KodeJenisBahanBaku' => 'JBB00004', // Referencing Batu Bata
            //     'JumlahPembelian' => '1500',
            //     'UnitBahanBaku' => 'pcs',
            //     'kode_supplier' => 'SUP00004', // Referencing Toko Serba Ada
            //     'HargaBahanBaku' => '1500000', // 1500 pcs * 1,000
            //     'TanggalPembelian' => '2024-10-18 09:30:00',
            // ],
            [
                'KodePembelian' => 'PBL00005',
                'KodeJenisBahanBaku' => 'JBB00005', // Referencing Besi Beton
                'JumlahPembelian' => '100',
                'UnitBahanBaku' => 'btg',
                'kode_supplier' => 'SUP00005', // Referencing PT Karya Bersama
                'HargaBahanBaku' => '7500000', // 100 batang * 75,000
                'TanggalPembelian' => '2024-10-20 13:00:00',
            ],
            [
                'KodePembelian' => 'PBL00006',
                'KodeJenisBahanBaku' => 'JBB00006', // Referencing Kawat
                'JumlahPembelian' => '70',
                'UnitBahanBaku' => 'kg',
                'kode_supplier' => 'SUP00006', // Referencing CV Cahaya Abadi
                'HargaBahanBaku' => '1750000', // 70 kg * 25,000
                'TanggalPembelian' => '2024-10-22 15:15:00',
            ],
            [
                'KodePembelian' => 'PBL00007',
                'KodeJenisBahanBaku' => 'JBB00007', // Referencing Cat Tembok
                'JumlahPembelian' => '40',
                'UnitBahanBaku' => 'liter',
                'kode_supplier' => 'SUP00007', // Referencing UD Makmur Jaya
                'HargaBahanBaku' => '2000000', // 40 liter * 50,000
                'TanggalPembelian' => '2024-10-25 10:00:00',
            ],
            [
                'KodePembelian' => 'PBL00008',
                'KodeJenisBahanBaku' => 'JBB00008', // Referencing Paku
                'JumlahPembelian' => '60',
                'UnitBahanBaku' => 'kg',
                'kode_supplier' => 'SUP00008', // Referencing Toko Aneka Jaya
                'HargaBahanBaku' => '900000', // 60 kg * 15,000
                'TanggalPembelian' => '2024-10-27 14:45:00',
            ],
            [
                'KodePembelian' => 'PBL00009',
                'KodeJenisBahanBaku' => 'JBB00009', // Referencing Genteng
                'JumlahPembelian' => '250',
                'UnitBahanBaku' => 'pcs',
                'kode_supplier' => 'SUP00009', // Referencing PT Sumber Rejeki
                'HargaBahanBaku' => '1250000', // 250 pcs * 5,000
                'TanggalPembelian' => '2021-10-29 12:30:00',
            ],
            [
                'KodePembelian' => 'PBL00010',
                'KodeJenisBahanBaku' => 'JBB00010', // Referencing Keramik
                'JumlahPembelian' => '150',
                'UnitBahanBaku' => 'box',
                'kode_supplier' => 'SUP00010', // Referencing CV Bintang Terang
                'HargaBahanBaku' => '13500000', // 150 box * 90,000
                'TanggalPembelian' => '2023-10-31 08:45:00',
            ],
        ];

        foreach ($pembelianData as $pembelian) {
            Pembelian::create($pembelian);
        }
    }
}
