<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PblKelompok extends Model
{
    protected $guarded = [];

    public function kegpbl(){
        return $this->belongsTo(PblKeg::class, 'keg_id');
    }
}
