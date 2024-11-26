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
                'JumlahBahanBaku' => '0', // 100 - 20
            
            ],
            [
                'KodebahanBaku' => 'STB00002',
                'KodeJenisBahanBaku' => 'JBB00002', // Referencing Semen
                'NamaBahanBaku' => 'Semen Portland Tipe I',
                'JumlahBahanBaku' => '0', // 500 - 100
            
            ],
            [
                'KodebahanBaku' => 'STB00003',
                'KodeJenisBahanBaku' => 'JBB00003', // Referencing Pasir
                'NamaBahanBaku' => 'Pasir Halus',
                'JumlahBahanBaku' => '0', // 1000 - 200
        
            ],
            [
                'KodebahanBaku' => 'STB00004',
                'KodeJenisBahanBaku' => 'JBB00004', // Referencing Batu Bata
                'NamaBahanBaku' => 'Batu Bata Merah',
                'JumlahBahanBaku' => '0', // 5000 - 1500
         
            ],
            [
                'KodebahanBaku' => 'STB00005',
                'KodeJenisBahanBaku' => 'JBB00005', // Referencing Besi Beton
                'NamaBahanBaku' => 'Besi Beton Ulir',

                'JumlahBahanBaku' => '0', // 300 - 50
  
            ],
            [
                'KodebahanBaku' => 'STB00006',
                'KodeJenisBahanBaku' => 'JBB00006', // Referencing Kawat
                'NamaBahanBaku' => 'Kawat Ikat',
    
                'JumlahBahanBaku' => '0', // 200 - 30
       
            ],
            [
                'KodebahanBaku' => 'STB00007',
                'KodeJenisBahanBaku' => 'JBB00007', // Referencing Cat Tembok
                'NamaBahanBaku' => 'Cat Tembok Putih',
    
                'JumlahBahanBaku' => '0', // 150 - 20
      
            ],
            [
                'KodebahanBaku' => 'STB00008',
                'KodeJenisBahanBaku' => 'JBB00008', // Referencing Paku
                'NamaBahanBaku' => 'Paku 5 cm',
     
            
                'JumlahBahanBaku' => '0', // 100 - 15
        
            ],
            [
                'KodebahanBaku' => 'STB00009',
                'KodeJenisBahanBaku' => 'JBB00009', // Referencing Genteng
                'NamaBahanBaku' => 'Genteng Beton',



                'JumlahBahanBaku' => '0', // 800 - 200

            ],
            [
                'KodebahanBaku' => 'STB00010',
                'KodeJenisBahanBaku' => 'JBB00010', // Referencing Keramik
                'NamaBahanBaku' => 'Keramik Lantai 30x30',              
                'JumlahBahanBaku' => '0', // 300 - 50

            ],
        ];

        foreach ($stokBahanBakuData as $stok) {
            StokBahanBaku::create($stok);
        }
    }
}
