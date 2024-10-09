<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokBahanBaku extends Model
{
    use HasFactory;
    protected $fillable = [
        'Kodebahanbaku',
        'NamaBahanBaku',
        'JenisBahanBaku',
        'UnitBahanBaku',
        'JumlahBBMasuk',
        'JumlahBBKeluar',
        'Jumlah_Min',
        'HargaBahanBaku',
        'JumlahBahanBaku',
        'PemakaianRataRata',
    ];
}
