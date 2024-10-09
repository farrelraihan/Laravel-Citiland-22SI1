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
        'KodeBahanBaku',
        'NamaBahanBaku',
        'JenisBahanBaku',
        'JumlahPembelian',
        'UnitBahanBaku',
        'NamaSupplier',
        'NomorNota',
        'HargaBahanBaku',
        'TanggalPembelian',
    ];
}
