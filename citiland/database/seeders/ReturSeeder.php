<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Retur; // Assuming you have this model

class ReturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $returData = [
            [
                'KodeRetur' => 'RTR00001',
                'KodePembelian' => 'PBL00001', // Referencing Pembelian
                'JumlahBahanBaku' => 5,
                'HargaRetur' => 15000, // 5 m3 * 1,500,000
                'TanggalRetur' => '2024-01-12 11:00:00',
            ],
            [
                'KodeRetur' => 'RTR00002',
                'KodePembelian' => 'PBL00002', // Referencing Pembelian
                'JumlahBahanBaku' => 10,
                'HargaRetur' => 25000, // 10 sak * 60,000
                'TanggalRetur' => '2024-02-15 15:30:00',
            ],
            [
                'KodeRetur' => 'RTR00003',
                'KodePembelian' => 'PBL00003', // Referencing Pembelian
                'JumlahBahanBaku' => 5,
                'HargaRetur' => 30000, // 50 kg * 2,000
                'TanggalRetur' => '2024-03-18 10:00:00',
            ],
            [
                'KodeRetur' => 'RTR00004',
                'KodePembelian' => 'PBL00004', // Referencing Pembelian
                'JumlahBahanBaku' => 10,
                'HargaRetur' => 18000, // 100 pcs * 1,000
                'TanggalRetur' => '2024-04-20 14:00:00',
            ],
            [
                'KodeRetur' => 'RTR00005',
                'KodePembelian' => 'PBL00005', // Referencing Pembelian
                'JumlahBahanBaku' => 10,
                'HargaRetur' => 12000, // 10 batang * 75,000
                'TanggalRetur' => '2024-05-22 11:30:00',
            ],
            [
                'KodeRetur' => 'RTR00006',
                'KodePembelian' => 'PBL00006', // Referencing Pembelian
                'JumlahBahanBaku' => 20,
                'HargaRetur' => 22000, // 20 kg * 25,000
                'TanggalRetur' => '2024-06-24 13:15:00',
            ],
            [
                'KodeRetur' => 'RTR00007',
                'KodePembelian' => 'PBL00007', // Referencing Pembelian
                'JumlahBahanBaku' => 5,
                'HargaRetur' => 30000, // 5 liter * 50,000
                'TanggalRetur' => '2024-07-26 12:45:00',
            ],
            [
                'KodeRetur' => 'RTR00008',
                'KodePembelian' => 'PBL00008', // Referencing Pembelian
                'JumlahBahanBaku' => 15,
                'HargaRetur' => 3000, // 15 kg * 15,000
                'TanggalRetur' => '2024-08-28 14:30:00',
            ],
            [
                'KodeRetur' => 'RTR00009',
                'KodePembelian' => 'PBL00009', // Referencing Pembelian
                'JumlahBahanBaku' => 20,
                'HargaRetur' => 20000, // 20 pcs * 5,000
                'TanggalRetur' => '2024-09-30 09:00:00',
            ],
            [
                'KodeRetur' => 'RTR00010',
                'KodePembelian' => 'PBL00010', // Referencing Pembelian
                'JumlahBahanBaku' => 15,
                'HargaRetur' => 12000, // 15 box * 90,000
                'TanggalRetur' => '2024-10-01 16:00:00',
            ],
        ];

        foreach ($returData as $retur) {
            Retur::create($retur);
        }
    }
}
