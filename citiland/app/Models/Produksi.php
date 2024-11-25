<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'KodeProduksi',
        'KodeBarang',
        'NamaBarang',
        
    ];

    protected $primaryKey = 'KodeProduksi';
    public $incrementing = false;

    public static function getLastPrimaryId()
{
    return self::orderBy('KodeProduksi', 'desc')->first()->KodeProduksi ?? 'No records found';
}
}
