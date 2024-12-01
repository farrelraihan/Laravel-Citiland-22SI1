<?php

namespace App\Imports;

use App\Models\StokBahanBaku;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StokImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new StokBahanBaku([
            'KodeBahanBaku' => $row['kodebahanbaku'],
            'KodeJenisBahanBaku' => $row['kodejenisbahanbaku'],
            'NamaBahanBaku' => $row['namabahanbaku'],
            'JumlahBahanBaku' => $row['jumlahbahanbaku'],
        ]);
    }
}
