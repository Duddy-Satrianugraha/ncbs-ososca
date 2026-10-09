<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PblPeserta extends Model
{
  protected $fillable = [
    'keg_id',
    'kelompok_id',     // ✅ tambahkan ini
    'name',
    'npm',
    'kelompok',        // (opsional sementara) kolom lama idkel
    'nama_kelompok',   // (opsional)
    'qrpeserta',
    'status',
];

protected $casts = ['status' => 'boolean'];

public function kelompok()
{
    return $this->belongsTo(PblKelompok::class, 'kelompok_id');
}

public function keg()
{
    return $this->belongsTo(PblKeg::class, 'keg_id');
}

}
