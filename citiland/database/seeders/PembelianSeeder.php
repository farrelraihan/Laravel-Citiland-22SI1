<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PembelianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('pembelians')->insert([
            [
                'KodeBahanBaku' => 'BHN001', // max 10 chars
                'NamaBahanBaku' => 'Kayu Jati', // max 100 chars
                'JenisBahanBaku' => 'KAYU', // max 5 chars
                'JumlahPembelian' => '5000', // max 20 chars
                'UnitBahanBaku' => 'Pcs', // max 5 chars
                'NamaSupplier' => 'PT Supplier Kayu Jaya', // max 40 chars
                'NomorNota' => 'INV20231001', // max 30 chars
                'HargaBahanBaku' => '750000', // max 25 chars
                'TanggalPembelian' => now(), // DateTime
            ],
            [
                'KodeBahanBaku' => 'BHN002', // max 10 chars
                'NamaBahanBaku' => 'Kayu Mahoni', // max 100 chars
                'JenisBahanBaku' => 'KAYU', // max 5 chars
                'JumlahPembelian' => '3000', // max 20 chars
                'UnitBahanBaku' => 'Pcs', // max 5 chars
                'NamaSupplier' => 'CV Mitra Mahoni', // max 40 chars
                'NomorNota' => 'INV20231002', // max 30 chars
                'HargaBahanBaku' => '500000', // max 25 chars
                'TanggalPembelian' => now(), // DateTime
            ],
        ]);
    }
}
