<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_supplier',
        'nama_supplier',
        'noHP_supplier',
        'alamat_supplier',
    ];

    protected $primaryKey = 'kode_supplier';
    public $incrementing = false;
    public static function getLastPrimaryId()
{
    return self::orderBy('kode_supplier', 'desc')->first()->kode_supplier ?? 'No records found';
}
}
