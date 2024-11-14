<?php

namespace App\Imports;

use App\Models\Retur;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ReturImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Retur([
            'KodeRetur' => $row['KodeRetur'],
            'KodeJenisBahanBaku' => $row['KodeJenisBahanBaku'],
            'kode_supplier' => $row['kode_supplier'],
            'JumlahBahanBaku' => $row['JumlahBahanBaku'],
            'HargaRetur' => $row['HargaRetur'],
            'satuanBahanBaku' => $row['satuanBahanBaku'],
            'TanggalRetur' => $row['TanggalRetur'],
        ]);
    }
}
