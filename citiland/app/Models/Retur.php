<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retur extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'KodeRetur',
        'KodeJenisBahanBaku',
        'kode_supplier',
        'JumlahBahanBaku',
        'HargaRetur',
        'satuanBahanBaku',
        'TanggalRetur',
    ];  

    protected $primaryKey = 'KodeRetur';
    public $incrementing = false;
}
