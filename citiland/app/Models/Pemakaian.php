<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemakaian extends Model
{
    use HasFactory;


    protected $fillable = [
        'KodePemakaian',
        'KodeJenisBahanBaku',
        'JumlahPemakaian',
        'UnitBahanBaku',
        'TanggalPemakaian',
    ];

    protected $primaryKey = 'KodePemakaian';
    public $incrementing = false;
    public $timestamps = false;

        public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'KodeJenisBahanBaku', 'KodeJenisBahanBaku');
    }

    public static function getLastPrimaryId()
{
    return self::orderBy('KodePemakaian', 'desc')->first()->KodePemakaian ?? 'No records found';
}
}
