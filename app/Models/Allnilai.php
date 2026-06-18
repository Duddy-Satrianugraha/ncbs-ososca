<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allnilai extends Model
{
    protected $fillable = [
        'nama',
        'jenis_nilai',
        'blok',
        'tahun_akademik',
        'input_by',
        'checked_by',
        'approved_by',
        'published_by',
        'lastupdated_by',
    ];
}
