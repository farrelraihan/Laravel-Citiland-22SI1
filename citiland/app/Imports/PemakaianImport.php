<?php

namespace App\Imports;

use App\Models\Pemakaian;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PemakaianImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pemakaian([
            'KodePemakaian' => $row['KodePemakaian'],
            'KodeJenisBahanBaku' => $row['KodeJenisBahanBaku'],
            'JumlahPemakaian' => $row['JumlahPemakaian'],
            'UnitBahanBaku' => $row['UnitBahanBaku'],
            'TanggalPemakaian' => $row['TanggalPemakaian'],
        ]);
    }
}
