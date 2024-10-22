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
}
