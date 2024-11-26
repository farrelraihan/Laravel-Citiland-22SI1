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
                'KodeJenisBahanBaku' => 'JBB00001', // Referencing Kayu Jati
             'kode_supplier' => 'SUP00001', // Referencing PT Maju Jaya
             'JumlahBahanBaku' => 5,
             'HargaRetur' => '7500000', // 5 m3 * 1,500,000
             'TanggalRetur' => '2024-10-12 11:00:00',
            ],
            [
                'KodeRetur' => 'RTR00002',
               'KodeJenisBahanBaku' => 'JBB00002', // Referencing Semen
               'kode_supplier' => 'SUP00002', // Referencing CV Sumber Makmur
               'JumlahBahanBaku' => 10,
               'HargaRetur' => '600000', // 10 sak * 60,000

               'TanggalRetur' => '2024-09-15 15:30:00',
         ],
         [
               'KodeRetur' => 'RTR00003',
               'KodeJenisBahanBaku' => 'JBB00003', // Referencing Pasir
               'kode_supplier' => 'SUP00003', // Referencing UD Berkah Abadi
               'JumlahBahanBaku' => 5,
               'HargaRetur' => '100000', // 50 kg * 2,000
     
               'TanggalRetur' => '2024-08-18 10:00:00',
         ],
         [
               'KodeRetur' => 'RTR00004',
               'KodeJenisBahanBaku' => 'JBB00004', // Referencing Batu Bata
               'kode_supplier' => 'SUP00004', // Referencing Toko Serba Ada
               'JumlahBahanBaku' => 10,
               'HargaRetur' => '100000', // 100 pcs * 1,000
             
               'TanggalRetur' => '2024-07-20 14:00:00',
         ],
            [
                'KodeRetur' => 'RTR00005',
                'KodeJenisBahanBaku' => 'JBB00005', // Referencing Besi Beton
                'kode_supplier' => 'SUP00005', // Referencing PT Karya Bersama
                'JumlahBahanBaku' => 10,
                'HargaRetur' => '750000', // 10 batang * 75,000
        
                'TanggalRetur' => '2024-06-22 11:30:00',
            ],
            [
                'KodeRetur' => 'RTR00006',
                'KodeJenisBahanBaku' => 'JBB00006', // Referencing Kawat
                'kode_supplier' => 'SUP00006', // Referencing CV Cahaya Abadi
                'JumlahBahanBaku' => 20,
                'HargaRetur' => '500000', // 20 kg * 25,000
 
                'TanggalRetur' => '2024-05-24 13:15:00',
            ],
            [
                'KodeRetur' => 'RTR00007',
                'KodeJenisBahanBaku' => 'JBB00007', // Referencing Cat Tembok
                'kode_supplier' => 'SUP00007', // Referencing UD Makmur Jaya
                'JumlahBahanBaku' => 5,
                'HargaRetur' => '250000', // 5 liter * 50,000
          
                'TanggalRetur' => '2024-04-26 12:45:00',
            ],
            [
                'KodeRetur' => 'RTR00008',
                'KodeJenisBahanBaku' => 'JBB00008', // Referencing Paku
                'kode_supplier' => 'SUP00008', // Referencing Toko Aneka Jaya
                'JumlahBahanBaku' => 15,
                'HargaRetur' => '225000', // 15 kg * 15,000
      
                'TanggalRetur' => '2024-03-28 14:30:00',
            ],
            [
                'KodeRetur' => 'RTR00009',
                'KodeJenisBahanBaku' => 'JBB00009', // Referencing Genteng
                'kode_supplier' => 'SUP00009', // Referencing PT Sumber Rejeki
                'JumlahBahanBaku' => 20,
                'HargaRetur' => '100000', // 20 pcs * 5,000

                'TanggalRetur' => '2024-10-30 09:00:00',
            ],
            [
                'KodeRetur' => 'RTR00010',
                'KodeJenisBahanBaku' => 'JBB00010', // Referencing Keramik
                'kode_supplier' => 'SUP00010', // Referencing CV Bintang Terang
                'JumlahBahanBaku' => 15,
                'HargaRetur' => '1350000', // 15 box * 90,000
  
                'TanggalRetur' => '2024-11-01 16:00:00',
            ],
        ];

        foreach ($returData as $retur) {
            Retur::create($retur);
        }
    }
}
