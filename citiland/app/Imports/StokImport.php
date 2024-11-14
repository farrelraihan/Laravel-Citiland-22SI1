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
            'KodebahanBaku' => $row['KodebahanBaku'],
            'KodeJenisBahanBaku' => $row['KodeJenisBahanBaku'],
            'NamaBahanBaku' => $row['NamaBahanBaku'],
            'UnitBahanBaku' => $row['UnitBahanBaku'],
            'JumlahBBMasuk' => $row['JumlahBBMasuk'],
            'JumlahBBKeluar' => $row['JumlahBBKeluar'],
            'Jumlah_Min' => $row['Jumlah_Min'],
            'HargaBahanBaku' => $row['HargaBahanBaku'],
            'JumlahBahanBaku' => $row['JumlahBahanBaku'],
            'PemakaianRataRata' => $row['PemakaianRataRata'],
        ]);
    }
}
