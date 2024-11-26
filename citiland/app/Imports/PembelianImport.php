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
            'KodePembelian' => $row['kodepembelian'],
            'KodeJenisBahanBaku' => $row['kodejenisbahanbaku'],
            'JumlahPembelian' => $row['jumlahpembelian'],
            'kode_supplier' => $row['kode_supplier'],
            'HargaBahanBaku' => $row['hargabahanbaku'],
            'TanggalPembelian' => $row['tanggalpembelian'],
        ]);
    }
}
