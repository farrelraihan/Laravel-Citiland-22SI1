<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;
    protected $fillable = [
        'kodeGudang',
        'nama_Gudang',
        'noHP_Gudang',
        'email_Gudang',
    ];

    protected $primaryKey = 'kodeGudang';

    public $incrementing = false;

    public static function getLastPrimaryId()
{
    return self::orderBy('kodeGudang', 'desc')->first()->kodeGudang ?? 'No records found';
}
}
