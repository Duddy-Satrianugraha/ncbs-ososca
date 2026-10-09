<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PblKeg extends Model
{
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function mininotes()
    {
        return $this->hasMany(PblMininote::class, 'keg_id');
    }
    public function kelompok()
    {
        return $this->hasMany(PblKelompok::class, 'keg_id');
    }
}
