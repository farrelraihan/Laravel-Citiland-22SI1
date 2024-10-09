<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('admins')->insert([
            [
                'Nama' => 'John Doe', 
                'NoHP' => '081234567890', 
                'Email' => 'john.doe@example.com', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Nama' => 'Jane Smith', 
                'NoHP' => '082134567891', 
                'Email' => 'jane.smith@example.com', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
