<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PblNilai extends Model
{
    protected $guarded = [];

    public function peserta(){
        return $this->belongsTo(PblPeserta::class, 'peserta_id');
    }

}
