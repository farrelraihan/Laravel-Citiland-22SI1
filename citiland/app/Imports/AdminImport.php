<?php

namespace App\Imports;

use App\Models\Admin;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AdminImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Admin([
            'kodeAdmin' => $row['kode_admin'],
            'Nama' => $row['nama'],
            'NoHP' => $row['no_hp'],
            'Email' => $row['email'],
        ]);
    }
}
