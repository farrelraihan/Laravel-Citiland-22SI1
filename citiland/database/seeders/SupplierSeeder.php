<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier; // Assuming you have a Supplier model

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Delete existing records to avoid duplication
        Supplier::query()->delete(); // Menghapus data yang ada di tabel suppliers

        // Seed new records
        $supplier = new Supplier;
        $supplier->kode_supplier = 'SUP001';
        $supplier->nama_supplier = 'Supplier A';
        $supplier->noHP_supplier = '081234567890';
        $supplier->alamat_supplier = 'Jalan Supplier A No. 123';
        $supplier->save();

        $supplier = new Supplier;
        $supplier->kode_supplier = 'SUP002';
        $supplier->nama_supplier = 'Supplier B';
        $supplier->noHP_supplier = '081234567891';
        $supplier->alamat_supplier = 'Jalan Supplier B No. 456';
        $supplier->save();

        $supplier = new Supplier;
        $supplier->kode_supplier = 'SUP003';
        $supplier->nama_supplier = 'Supplier C';
        $supplier->noHP_supplier = '081234567892';
        $supplier->alamat_supplier = 'Jalan Supplier C No. 789';
        $supplier->save();
    }
}
