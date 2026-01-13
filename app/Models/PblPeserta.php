<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PblPeserta extends Model
{
    protected $fillable = [
        'keg_id',
        'name',
        'npm',
        'kelompok',
        'nama_kelompok',
        'qrpeserta',
        'status',
    ];
    protected $casts = ['status' => 'boolean'];

}
