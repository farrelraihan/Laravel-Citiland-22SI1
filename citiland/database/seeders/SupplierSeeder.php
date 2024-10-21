<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supplierData = [
            [
                'kode_supplier' => 'SUP00001',
                'nama_supplier' => 'PT Maju Jaya',
                'noHP_supplier' => '081234567890',
                'alamat_supplier' => 'Jl. Industri No. 123, Jakarta',
            ],
            [
                'kode_supplier' => 'SUP00002',
                'nama_supplier' => 'CV Sumber Makmur',
                'noHP_supplier' => '085678901234',
                'alamat_supplier' => 'Jl. Raya Bogor KM. 45, Bogor',
            ],
            [
                'kode_supplier' => 'SUP00003',
                'nama_supplier' => 'UD Berkah Abadi',
                'noHP_supplier' => '089012345678',
                'alamat_supplier' => 'Jl. Ahmad Yani No. 78, Bandung',
            ],
            [
                'kode_supplier' => 'SUP00004',
                'nama_supplier' => 'Toko Serba Ada',
                'noHP_supplier' => '082134567890',
                'alamat_supplier' => 'Jl. Sudirman No. 90, Surabaya',
            ],
            [
                'kode_supplier' => 'SUP00005',
                'nama_supplier' => 'PT Karya Bersama',
                'noHP_supplier' => '087654321098',
                'alamat_supplier' => 'Jl. Gatot Subroto No. 55, Medan',
            ],
            [
                'kode_supplier' => 'SUP00006',
                'nama_supplier' => 'CV Cahaya Abadi',
                'noHP_supplier' => '081345678901',
                'alamat_supplier' => 'Jl. Diponegoro No. 23, Semarang',
            ],
            [
                'kode_supplier' => 'SUP00007',
                'nama_supplier' => 'UD Makmur Jaya',
                'noHP_supplier' => '085789012345',
                'alamat_supplier' => 'Jl. Raya Bekasi KM. 17, Bekasi',
            ],
            [
                'kode_supplier' => 'SUP00008',
                'nama_supplier' => 'Toko Aneka Jaya',
                'noHP_supplier' => '089123456780',
                'alamat_supplier' => 'Jl. Merdeka No. 45, Yogyakarta',
            ],
            [
                'kode_supplier' => 'SUP00009',
                'nama_supplier' => 'PT Sumber Rejeki',
                'noHP_supplier' => '082234567891',
                'alamat_supplier' => 'Jl. Soekarno Hatta No. 67, Malang',
            ],
            [
                'kode_supplier' => 'SUP00010',
                'nama_supplier' => 'CV Bintang Terang',
                'noHP_supplier' => '087754321099',
                'alamat_supplier' => 'Jl. Pahlawan No. 89, Denpasar',
            ],
        ];

        foreach ($supplierData as $supplier) {
            Supplier::create($supplier);
        }
    }
}