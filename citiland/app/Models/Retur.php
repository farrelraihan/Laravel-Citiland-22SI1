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
        'KodeJenisBahanBaku',
        'kode_supplier',
        'JumlahBahanBaku',
        'HargaRetur',
        'TanggalRetur',
    ];  

    protected $primaryKey = 'KodeRetur';
    public $incrementing = false;

    protected static function booted()
    {
        static::creating(function ($retur) {
            // Validate that JumlahBahanBaku is positive
            if ($retur->JumlahBahanBaku <= 0) {
                throw new \Exception('JumlahBahanBaku must be greater than zero.');
            }

            // Check stock availability
            $stok = \DB::table('stok_bahan_bakus')
                ->where('KodeJenisBahanBaku', $retur->KodeJenisBahanBaku)
                ->first();

            if (!$stok || $stok->JumlahBahanBaku < $retur->JumlahBahanBaku) {
                throw new \Exception('Insufficient stock for this return.');
            }
        });

        static::created(function ($retur) {
            \DB::table('stok_bahan_bakus')
                ->where('KodeJenisBahanBaku', $retur->KodeJenisBahanBaku)
                ->decrement('JumlahBahanBaku', $retur->JumlahBahanBaku);
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
    $lastRecord = self::orderBy('KodeRetur', 'desc')->first();
    return $lastRecord ? $lastRecord->KodeRetur : 'No records found';
}
}
