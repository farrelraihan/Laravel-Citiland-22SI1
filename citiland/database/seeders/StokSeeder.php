<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('stok_bahan_bakus')->insert([
            [
                'Kodebahanbaku' => 'BHN001', // max 10 chars
                'NamaBahanBaku' => 'Kayu Jati', // max 100 chars
                'JenisBahanBaku' => 'KAYU', // max 5 chars
                'UnitBahanBaku' => 'Pcs', // max 5 chars
                'JumlahBBMasuk' => '10000', // max 10 chars
                'JumlahBBKeluar' => '2000', // max 10 chars
                'Jumlah_Min' => '500', // max 10 chars
                'HargaBahanBaku' => '500000', // max 30 chars
                'JumlahBahanBaku' => '8000', // max 10 chars
                'PemakaianRataRata' => '150', // max 25 chars
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Kodebahanbaku' => 'BHN002', // max 10 chars
                'NamaBahanBaku' => 'Kayu Mahoni', // max 100 chars
                'JenisBahanBaku' => 'KAYU', // max 5 chars
                'UnitBahanBaku' => 'Pcs', // max 5 chars
                'JumlahBBMasuk' => '7000', // max 10 chars
                'JumlahBBKeluar' => '1500', // max 10 chars
                'Jumlah_Min' => '300', // max 10 chars
                'HargaBahanBaku' => '300000', // max 30 chars
                'JumlahBahanBaku' => '5500', // max 10 chars
                'PemakaianRataRata' => '120', // max 25 chars
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
