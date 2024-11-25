<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembelian extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'KodePembelian',
        'KodeJenisBahanBaku',
        'JumlahPembelian',
        'UnitBahanBaku',
        'kode_supplier',
        'HargaBahanBaku',
        'TanggalPembelian',
    ];

    protected $primaryKey = 'KodePembelian';
    public $incrementing = false;

        public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'KodeJenisBahanBaku', 'KodeJenisBahanBaku');
    }

    public function supplier()
    {
        return $this
        ->belongsTo(Supplier::class, 'kode_supplier', 'kode_supplier');
    }

    public static function getLastPrimaryId()
{
    return self::orderBy('KodePembelian', 'desc')->first()->KodePembelian ?? 'No records found';
}
}
