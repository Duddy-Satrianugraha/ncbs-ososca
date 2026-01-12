<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
   protected $fillable = [
        'user_id','disk','path','token','original_name','mime','size'
    ];

    protected $appends = ['display_url','filename'];

    public function getFilenameAttribute(): string
    {
        return basename($this->path);
    }

    public function getDisplayUrlAttribute(): string
    {
        if ($this->disk === 'public') {
            return Storage::disk('public')->url($this->path);
        }

        // private pakai token + filename
        return route('mfile', [
            'token' => $this->token,
            'filename' => $this->filename,
        ]);
    }
}
