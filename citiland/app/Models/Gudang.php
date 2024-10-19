<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_Gudang',
        'nama_Gudang',
        'noHP_Gudang',
        'email_Gudang',
    ];

}
