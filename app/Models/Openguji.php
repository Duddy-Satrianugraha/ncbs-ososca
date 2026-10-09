<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Openguji extends Model
{
    protected $guarded = [];
    public function tutor(){
        return $this->hasMany(PblBa::class, 'tutor_id');
    }
}
