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
        'KodeSupplier',
        'JumlahBahanBaku',
        'HargaRetur',
        'TanggalRetur',
    ];  
}
