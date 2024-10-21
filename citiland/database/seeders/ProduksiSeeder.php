<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produksi; // Assuming you have this model

class ProduksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produksiData = [
            [
                'KodeProduksi' => 'PRD00001',
                'KodeBarang' => 'BRG00001',
                'NamaBarang' => 'Meja Kayu Jati',
            ],
            [
                'KodeProduksi' => 'PRD00002',
                'KodeBarang' => 'BRG00002',
                'NamaBarang' => 'Kursi Rotan',
            ],
            [
                'KodeProduksi' => 'PRD00003',
                'KodeBarang' => 'BRG00003',
                'NamaBarang' => 'Lemari Pakaian',
            ],
            [
                'KodeProduksi' => 'PRD00004',
                'KodeBarang' => 'BRG00004',
                'NamaBarang' => 'Rak Buku Minimalis',
            ],
            [
                'KodeProduksi' => 'PRD00005',
                'KodeBarang' => 'BRG00005',
                'NamaBarang' => 'Sofa Kulit',
            ],
            [
                'KodeProduksi' => 'PRD00006',
                'KodeBarang' => 'BRG00006',
                'NamaBarang' => 'Tempat Tidur King Size',
            ],
            [
                'KodeProduksi' => 'PRD00007',
                'KodeBarang' => 'BRG00007',
                'NamaBarang' => 'Meja Makan Marmer',
            ],
            [
                'KodeProduksi' => 'PRD00008',
                'KodeBarang' => 'BRG00008',
                'NamaBarang' => 'Kabinet Dapur',
            ],
            [
                'KodeProduksi' => 'PRD00009',
                'KodeBarang' => 'BRG00009',
                'NamaBarang' => 'Buffet TV Modern',
            ],
            [
                'KodeProduksi' => 'PRD00010',
                'KodeBarang' => 'BRG00010',
                'NamaBarang' => 'Meja Kerja Minimalis',
            ],
            [
                'KodeProduksi' => 'PRD00011',
                'KodeBarang' => 'BRG00011',
                'NamaBarang' => 'Kursi Gaming Ergonomis',
            ],
        ];

        foreach ($produksiData as $produksi) {
            Produksi::create($produksi);
        }
    }
}
