<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PblMininote extends Model
{
    protected $guarded = [];

    public function keg()
    {
        return $this->belongsTo(PblKeg::class, 'keg_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
