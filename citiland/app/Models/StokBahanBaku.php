<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokBahanBaku extends Model
{
    use HasFactory;
    protected $fillable = [
        'KodeBahanBaku',
        'KodeJenisBahanBaku',
        'NamaBahanBaku',
        'JumlahBahanBaku',

    ];

    protected $primaryKey = 'KodeBahanBaku';

    public $incrementing = false;
    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'KodeJenisBahanBaku', 'KodeJenisBahanBaku');
    }
    public static function getLastPrimaryId()
    {
        $lastRecord = self::orderBy('KodeBahanBaku', 'desc')->first();
        return $lastRecord ? $lastRecord->KodebahanBaku : 'No records found';
    }
}
