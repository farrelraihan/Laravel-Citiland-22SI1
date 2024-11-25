<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;
    protected $primaryKey = 'KodeJenisBahanBaku';
    public $incrementing = false;
    protected $fillable = [
        'KodeJenisBahanBaku',
        'JenisBahanBaku',
    ];

    public static function getLastPrimaryId()
{
    return self::orderBy('KodeJenisBahanBaku', 'desc')->first()->KodeJenisBahanBaku ?? 'No records found';
}
}
