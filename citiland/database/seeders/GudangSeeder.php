<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gudang; // Assuming you have this model

class GudangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gudangData = [
            [
                'kodeGudang' => 'GDG00001',
                'nama_Gudang' => 'Gudang Utama',
                'noHP_Gudang' => '081234567890',
                'email_Gudang' => 'gudang_utama@example.com',
            ],
            [
                'kodeGudang' => 'GDG00002',
                'nama_Gudang' => 'Gudang Bahan Baku',
                'noHP_Gudang' => '085678901234',
                'email_Gudang' => 'bahan_baku@example.com',
            ],
            [
                'kodeGudang' => 'GDG00003',
                'nama_Gudang' => 'Gudang Sparepart',
                'noHP_Gudang' => '082112345678',
                'email_Gudang' => 'sparepart_gudang@example.com',
            ],
            [
                'kodeGudang' => 'GDG00004',
                'nama_Gudang' => 'Gudang Barang Jadi',
                'noHP_Gudang' => '082198765432',
                'email_Gudang' => 'barang_jadi_gudang@example.com',
            ],
            [
                'kodeGudang' => 'GDG00005',
                'nama_Gudang' => 'Gudang Kayu',
                'noHP_Gudang' => '085678932145',
                'email_Gudang' => 'gudang_kayu@example.com',
            ],
            [
                'kodeGudang' => 'GDG00006',
                'nama_Gudang' => 'Gudang Perkakas',
                'noHP_Gudang' => '081239847563',
                'email_Gudang' => 'gudang_perkakas@example.com',
            ],
            [
                'kodeGudang' => 'GDG00007',
                'nama_Gudang' => 'Gudang Tekstil',
                'noHP_Gudang' => '081923847562',
                'email_Gudang' => 'gudang_tekstil@example.com',
            ],
            [
                'kodeGudang' => 'GDG00008',
                'nama_Gudang' => 'Gudang Besi',
                'noHP_Gudang' => '085647382910',
                'email_Gudang' => 'gudang_besi@example.com',
            ],
            [
                'kodeGudang' => 'GDG00009',
                'nama_Gudang' => 'Gudang Listrik',
                'noHP_Gudang' => '085713849202',
                'email_Gudang' => 'gudang_listrik@example.com',
            ],
            [
                'kodeGudang' => 'GDG00010',
                'nama_Gudang' => 'Gudang Logistik',
                'noHP_Gudang' => '081234569876',
                'email_Gudang' => 'gudang_logistik@example.com',
            ],
            [
                'kodeGudang' => 'GDG00011',
                'nama_Gudang' => 'Gudang Kaca',
                'noHP_Gudang' => '085612349874',
                'email_Gudang' => 'gudang_kaca@example.com',
            ],
        ];

        foreach ($gudangData as $gudang) {
            Gudang::create($gudang);
        }
    }
}
