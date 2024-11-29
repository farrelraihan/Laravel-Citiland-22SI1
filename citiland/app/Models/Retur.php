<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\UpdatesStock;

class Retur extends Model
{
    use HasFactory;
    use UpdatesStock;
    public $timestamps = false;
    protected $fillable = [
        'KodeRetur',
        'KodePembelian',
        'JumlahBahanBaku',
        'HargaRetur',
        'TanggalRetur',
    ];

    protected $primaryKey = 'KodeRetur';
    public $incrementing = false;

    protected static function booted()
    {
        static::created(function ($retur) {
            $pembelian = $retur->pembelian;
            if ($pembelian) {
                \DB::table('stok_bahan_bakus')
                    ->where('KodeJenisBahanBaku', $pembelian->KodeJenisBahanBaku)
                    ->decrement('JumlahBahanBaku', $retur->JumlahBahanBaku);
            }
        });
    }

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'KodeJenisBahanBaku', 'KodeJenisBahanBaku');
    }

    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class, 'KodePembelian', 'KodePembelian');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'kode_supplier', 'kode_supplier');
    }

    public static function getLastPrimaryId()
{
    $lastRecord = self::orderBy('KodeRetur', 'desc')->first();
    return $lastRecord ? $lastRecord->KodeRetur : 'No records found';
}
}
