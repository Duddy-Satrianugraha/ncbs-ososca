<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PblKelompok extends Model
{
    protected $guarded = [];

    public function kegpbl(){
        return $this->belongsTo(PblKeg::class, 'keg_id');
    }

    public function pesertas()
        {
            return $this->hasMany(PblPeserta::class, 'kelompok_id');
        }
    public function beritaa(){
        return $this->hasMany(PblBa::class, 'kelompok_id');
        }
}
