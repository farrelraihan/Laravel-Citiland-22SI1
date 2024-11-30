<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\UpdatesStock;

class Pemakaian extends Model
{
    use HasFactory;
    use UpdatesStock;


    protected $fillable = [
        'KodePemakaian',
        'KodeJenisBahanBaku',
        'JumlahPemakaian',
        'TanggalPemakaian',
    ];

    protected $primaryKey = 'KodePemakaian';
    public $incrementing = false;
    public $timestamps = false;

    protected static function booted()
    {
        static::creating(function ($pemakaian) {
            // Validate that JumlahPemakaian is positive
            if ($pemakaian->JumlahPemakaian <= 0) {
                throw new \Exception('JumlahPemakaian must be greater than zero.');
            }

            // Check stock availability
            $stok = \DB::table('stok_bahan_bakus')
                ->where('KodeJenisBahanBaku', $pemakaian->KodeJenisBahanBaku)
                ->first();

            if (!$stok || $stok->JumlahBahanBaku < $pemakaian->JumlahPemakaian) {
                throw new \Exception('Insufficient stock for this usage.');
            }
        });


    }

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'KodeJenisBahanBaku', 'KodeJenisBahanBaku');
    }

    public static function getLastPrimaryId()
{
    $lastRecord = self::orderBy('KodePemakaian', 'desc')->first();
    return $lastRecord ? $lastRecord->KodePemakaian : 'No records found';
}
}
