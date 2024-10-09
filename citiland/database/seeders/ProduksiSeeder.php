<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProduksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('produksis')->insert([
            [
                'KodeBarang' => 'BRG001', // max 10 chars
                'NamaBarang' => 'Meja Kayu Jati', // max 50 chars
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'KodeBarang' => 'BRG002', // max 10 chars
                'NamaBarang' => 'Kursi Kayu Mahoni', // max 50 chars
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
