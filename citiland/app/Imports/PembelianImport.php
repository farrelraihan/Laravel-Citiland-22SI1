<?php

namespace App\Imports;

use App\Models\Pembelian;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PembelianImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pembelian([
            'KodePembelian' => $row['KodePembelian'],
            'KodeJenisBahanBaku' => $row['KodeJenisBahanBaku'],
            'JumlahPembelian' => $row['JumlahPembelian'],
            'UnitBahanBaku' => $row['UnitBahanBaku'],
            'kode_supplier' => $row['kode_supplier'],
            'HargaBahanBaku' => $row['HargaBahanBaku'],
            'TanggalPembelian' => $row['TanggalPembelian'],
        ]);
    }
}
