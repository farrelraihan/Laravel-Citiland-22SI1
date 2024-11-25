<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin; // Assuming you have this model

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminData = [
            [
                'kodeAdmin' => 'ADM00003',
                'Nama' => 'John Doe',
                'NoHP' => '081234567890',
                'Email' => 'john.doe@example.com',
            ],
            [
                'kodeAdmin' => 'ADM00004',
                'Nama' => 'Jane Smith',
                'NoHP' => '089876543210',
                'Email' => 'jane.smith@example.com',
            ],
            [
                'kodeAdmin' => 'ADM00005',
                'Nama' => 'Michael Brown',
                'NoHP' => '082112345678',
                'Email' => 'michael.brown@example.com',
            ],
            [
                'kodeAdmin' => 'ADM00006',
                'Nama' => 'Emily Davis',
                'NoHP' => '082198765432',
                'Email' => 'emily.davis@example.com',
            ],
            [
                'kodeAdmin' => 'ADM00007',
                'Nama' => 'David Wilson',
                'NoHP' => '085678932145',
                'Email' => 'david.wilson@example.com',
            ],
            [
                'kodeAdmin' => 'ADM00008',
                'Nama' => 'Sarah Miller',
                'NoHP' => '081239847563',
                'Email' => 'sarah.miller@example.com',
            ],
            [
                'kodeAdmin' => 'ADM00009',
                'Nama' => 'James Anderson',
                'NoHP' => '081923847562',
                'Email' => 'james.anderson@example.com',
            ],
            [
                'kodeAdmin' => 'ADM00010',
                'Nama' => 'Laura Thompson',
                'NoHP' => '085647382910',
                'Email' => 'laura.thompson@example.com',
            ],
            [
                'kodeAdmin' => 'ADM00011',
                'Nama' => 'Robert Johnson',
                'NoHP' => '085713849202',
                'Email' => 'robert.johnson@example.com',
            ],
            [
                'kodeAdmin' => 'ADM00012',
                'Nama' => 'Patricia Taylor',
                'NoHP' => '081234569876',
                'Email' => 'patricia.taylor@example.com',
            ],
            [
                'kodeAdmin' => 'ADM00013',
                'Nama' => 'Linda Martinez',
                'NoHP' => '085612349874',
                'Email' => 'linda.martinez@example.com',
            ],
        ];

        foreach ($adminData as $admin) {
            Admin::create($admin);
        }
    }
}
