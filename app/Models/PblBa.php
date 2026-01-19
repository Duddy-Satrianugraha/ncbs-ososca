<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PblBa extends Model
{
    protected $guarded = [];

    public function kelompok(){
        return $this->belongsTo(PblKelompok::class, 'kelompok_id');
    }
    public function sks()
    {
        return $this->belongsTo(PblMininote::class, 'sk_id');
    }



}
