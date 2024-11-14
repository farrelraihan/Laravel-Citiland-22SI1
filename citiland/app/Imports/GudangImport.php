<?php

namespace App\Imports;

use App\Models\Gudang;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GudangImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Gudang([
            'kodeGudang' => $row['kodeGudang'],
            'nama_Gudang' => $row['nama_Gudang'],
            'noHP_Gudang' => $row['noHP_gudang'],
            'email_Gudang' => $row['email_Gudang'],
        ]);
    }
}
