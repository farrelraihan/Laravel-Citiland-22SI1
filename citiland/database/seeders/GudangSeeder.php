<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gudang; // Assuming you have a Gudang model

class GudangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Delete existing records to avoid duplication
        Gudang::query()->delete(); // Menghapus data yang ada di tabel gudangs

        // Seed new records
        $gudang = new Gudang;
        $gudang->nama_Gudang = 'Gudang A';
        $gudang->noHP_Gudang = '081234567890';
        $gudang->email_Gudang = 'gudangA@example.com';
        $gudang->save();

        $gudang = new Gudang;
        $gudang->nama_Gudang = 'Gudang B';
        $gudang->noHP_Gudang = '081234567891';
        $gudang->email_Gudang = 'gudangB@example.com';
        $gudang->save();

        $gudang = new Gudang;
        $gudang->nama_Gudang = 'Gudang C';
        $gudang->noHP_Gudang = '081234567892';
        $gudang->email_Gudang = 'gudangC@example.com';
        $gudang->save();
    }
}
