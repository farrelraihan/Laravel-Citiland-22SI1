<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;


    protected $fillable = [
        'kodeAdmin',
        'Nama',
        'NoHP',
        'Email',
    ];

    protected $primaryKey = 'kodeAdmin';

    public $incrementing = false;

    public static function getLastPrimaryId()
{
    return self::orderBy('kodeAdmin', 'desc')->first()->kodeAdmin ?? 'No records found';
}
}
