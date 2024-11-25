<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokBahanBaku extends Model
{
    use HasFactory;
    protected $fillable = [
        'KodebahanBaku',
        'KodeJenisBahanBaku',
        'NamaBahanBaku',
        'UnitBahanBaku',
        'JumlahBBMasuk',
        'JumlahBBKeluar',
        'Jumlah_Min',
        'HargaBahanBaku',
        'JumlahBahanBaku',
        'PemakaianRataRata',
    ];

    protected $primaryKey = 'KodebahanBaku';

    public $incrementing = false;

    public function jenis()
{
    return $this->belongsTo(Jenis::class, 'KodeJenisBahanBaku', 'KodeJenisBahanBaku');
}
public static function getLastPrimaryId()
{
    return self::orderBy('KodebahanBaku', 'desc')->first()->KodebahanBaku ?? 'No records found';
}
}

