<?php

namespace App\Models;

use App\UpdatesStock;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembelian extends Model
{
    use HasFactory;
    use UpdatesStock;
    public $timestamps = false;
    protected $fillable = [
        'KodePembelian',
        'KodeJenisBahanBaku',
        'JumlahPembelian',
        'kode_supplier',
        'HargaBahanBaku',
        'TanggalPembelian',
    ];

    protected $primaryKey = 'KodePembelian';
    public $incrementing = false;

    protected static function booted()
    {
        static::creating(function ($pembelian) {
            // Validate that JumlahPembelian is positive
            if ($pembelian->JumlahPembelian <= 0) {
                throw new \Exception('JumlahPembelian must be greater than zero.');
            }
        });
        static::created(function ($pembelian) {
            \DB::table('stok_bahan_bakus')
                ->where('KodeJenisBahanBaku', $pembelian->KodeJenisBahanBaku)
                ->increment('JumlahBahanBaku', $pembelian->JumlahPembelian);
        });

        
    }

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
    $lastRecord = self::orderBy('KodePembelian', 'desc')->first();
    return $lastRecord ? $lastRecord->KodePembelian : 'No records found';
}
}
