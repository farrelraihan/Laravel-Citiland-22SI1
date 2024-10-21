<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StokBahanBaku; // Assuming you have this model

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stokBahanBakuData = [
            [
                'KodebahanBaku' => 'STB00001',
                'KodeJenisBahanBaku' => 'JBB00001', // Referencing Kayu Jati
                'NamaBahanBaku' => 'Kayu Jati Grade A',
                'UnitBahanBaku' => 'm3',
                'JumlahBBMasuk' => '100',
                'JumlahBBKeluar' => '20',
                'Jumlah_Min' => '10',
                'HargaBahanBaku' => '1500000',
                'JumlahBahanBaku' => '80', // 100 - 20
                'PemakaianRataRata' => '5',
            ],
            [
                'KodebahanBaku' => 'STB00002',
                'KodeJenisBahanBaku' => 'JBB00002', // Referencing Semen
                'NamaBahanBaku' => 'Semen Portland Tipe I',
                'UnitBahanBaku' => 'sak',
                'JumlahBBMasuk' => '500',
                'JumlahBBKeluar' => '100',
                'Jumlah_Min' => '50',
                'HargaBahanBaku' => '60000',
                'JumlahBahanBaku' => '400', // 500 - 100
                'PemakaianRataRata' => '20',
            ],
            [
                'KodebahanBaku' => 'STB00003',
                'KodeJenisBahanBaku' => 'JBB00003', // Referencing Pasir
                'NamaBahanBaku' => 'Pasir Halus',
                'UnitBahanBaku' => 'kg',
                'JumlahBBMasuk' => '1000',
                'JumlahBBKeluar' => '200',
                'Jumlah_Min' => '100',
                'HargaBahanBaku' => '200000',
                'JumlahBahanBaku' => '800', // 1000 - 200
                'PemakaianRataRata' => '25',
            ],
            [
                'KodebahanBaku' => 'STB00004',
                'KodeJenisBahanBaku' => 'JBB00004', // Referencing Batu Bata
                'NamaBahanBaku' => 'Batu Bata Merah',
                'UnitBahanBaku' => 'pcs',
                'JumlahBBMasuk' => '5000',
                'JumlahBBKeluar' => '1500',
                'Jumlah_Min' => '500',
                'HargaBahanBaku' => '1000',
                'JumlahBahanBaku' => '3500', // 5000 - 1500
                'PemakaianRataRata' => '300',
            ],
            [
                'KodebahanBaku' => 'STB00005',
                'KodeJenisBahanBaku' => 'JBB00005', // Referencing Besi Beton
                'NamaBahanBaku' => 'Besi Beton Ulir',
                'UnitBahanBaku' => 'btg',
                'JumlahBBMasuk' => '300',
                'JumlahBBKeluar' => '50',
                'Jumlah_Min' => '30',
                'HargaBahanBaku' => '75000',
                'JumlahBahanBaku' => '250', // 300 - 50
                'PemakaianRataRata' => '15',
            ],
            [
                'KodebahanBaku' => 'STB00006',
                'KodeJenisBahanBaku' => 'JBB00006', // Referencing Kawat
                'NamaBahanBaku' => 'Kawat Ikat',
                'UnitBahanBaku' => 'kg',
                'JumlahBBMasuk' => '200',
                'JumlahBBKeluar' => '30',
                'Jumlah_Min' => '10',
                'HargaBahanBaku' => '25000',
                'JumlahBahanBaku' => '170', // 200 - 30
                'PemakaianRataRata' => '7',
            ],
            [
                'KodebahanBaku' => 'STB00007',
                'KodeJenisBahanBaku' => 'JBB00007', // Referencing Cat Tembok
                'NamaBahanBaku' => 'Cat Tembok Putih',
                'UnitBahanBaku' => 'liter',
                'JumlahBBMasuk' => '150',
                'JumlahBBKeluar' => '20',
                'Jumlah_Min' => '15',
                'HargaBahanBaku' => '50000',
                'JumlahBahanBaku' => '130', // 150 - 20
                'PemakaianRataRata' => '5',
            ],
            [
                'KodebahanBaku' => 'STB00008',
                'KodeJenisBahanBaku' => 'JBB00008', // Referencing Paku
                'NamaBahanBaku' => 'Paku 5 cm',
                'UnitBahanBaku' => 'kg',
                'JumlahBBMasuk' => '100',
                'JumlahBBKeluar' => '15',
                'Jumlah_Min' => '5',
                'HargaBahanBaku' => '15000',
                'JumlahBahanBaku' => '85', // 100 - 15
                'PemakaianRataRata' => '3',
            ],
            [
                'KodebahanBaku' => 'STB00009',
                'KodeJenisBahanBaku' => 'JBB00009', // Referencing Genteng
                'NamaBahanBaku' => 'Genteng Beton',
                'UnitBahanBaku' => 'pcs',
                'JumlahBBMasuk' => '800',
                'JumlahBBKeluar' => '200',
                'Jumlah_Min' => '50',
                'HargaBahanBaku' => '5000',
                'JumlahBahanBaku' => '600', // 800 - 200
                'PemakaianRataRata' => '50',
            ],
            [
                'KodebahanBaku' => 'STB00010',
                'KodeJenisBahanBaku' => 'JBB00010', // Referencing Keramik
                'NamaBahanBaku' => 'Keramik Lantai 30x30',
                'UnitBahanBaku' => 'box',
                'JumlahBBMasuk' => '300',
                'JumlahBBKeluar' => '50',
                'Jumlah_Min' => '20',
                'HargaBahanBaku' => '90000',
                'JumlahBahanBaku' => '250', // 300 - 50
                'PemakaianRataRata' => '10',
            ],
        ];

        foreach ($stokBahanBakuData as $stok) {
            StokBahanBaku::create($stok);
        }
    }
}
