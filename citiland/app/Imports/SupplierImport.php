<?php

namespace App\Imports;

use App\Models\Supplier;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SupplierImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Supplier([
            'kode_supplier' => $row['kode_supplier'],
            'nama_supplier' => $row['nama_supplier'],
            'noHP_supplier' => $row['noHP_supplier'],
            'alamat_supplier' => $row['alamat_supplier'],
        ]);
    }
}
