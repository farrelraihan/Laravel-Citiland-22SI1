<?php

namespace App\Imports;

use App\Models\Produksi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProduksiImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Produksi([
            'KodeProduksi' => $row['kodeproduksi'],
            'KodeBarang' => $row['kodebarang'],
            'NamaBarang' => $row['namabarang'],
        ]);
    }
}
