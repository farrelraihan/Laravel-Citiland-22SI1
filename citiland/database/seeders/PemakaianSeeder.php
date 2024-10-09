<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemakaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('pemakaians')->insert([
            [
                'KodeBahanBaku' => 'BHN001', // max 10 chars
                'NamaBahanBaku' => 'Kayu Jati', // max 100 chars
                'JenisBahanBaku' => 'KAYU', // max 5 chars
                'UnitBahanBaku' => 'Pcs', // max 5 chars
                'JumlahPemakaian' => '2500', // max 20 chars
                'SaldoAwalBulan' => '10000', // max 50 chars
                'SaldoAkhirBulan' => '7500', // max 50 chars
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'KodeBahanBaku' => 'BHN002', // max 10 chars
                'NamaBahanBaku' => 'Kayu Mahoni', // max 100 chars
                'JenisBahanBaku' => 'KAYU', // max 5 chars
                'UnitBahanBaku' => 'Pcs', // max 5 chars
                'JumlahPemakaian' => '1800', // max 20 chars
                'SaldoAwalBulan' => '8000', // max 50 chars
                'SaldoAkhirBulan' => '6200', // max 50 chars
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
