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
            'KodeRetur' => $row['koderetur'],
            'KodePembelian' => $row['kodepembelian'],
            'JumlahBahanBaku' => $row['jumlahbahanbaku'],
            'HargaRetur' => $row['hargaretur'],
            'TanggalRetur' => $row['tanggalretur'],
        ]);
    }
}
