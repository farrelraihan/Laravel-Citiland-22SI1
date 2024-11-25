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
        public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'KodeJenisBahanBaku', 'KodeJenisBahanBaku');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'kode_supplier', 'kode_supplier');
    }

    public static function getLastPrimaryId()
{
    return self::orderBy('KodeRetur', 'desc')->first()->KodeRetur ?? 'No records found';
}
}
