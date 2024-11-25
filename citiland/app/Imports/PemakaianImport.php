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
            'KodePemakaian' => $row['kodepemakaian'],
            'KodeJenisBahanBaku' => $row['kodejenisbahanbaku'],
            'JumlahPemakaian' => $row['jumlahpemakaian'],
            'UnitBahanBaku' => $row['unitbahanbaku'],
            'TanggalPemakaian' => $row['tanggalpemakaian'],
        ]);
    }
}
