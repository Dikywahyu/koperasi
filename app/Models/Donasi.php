<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'donatur_id',
        'zisco_id',
        'jenis_donasi_id',
        'nominal',
        'bulan_donasi',
        'metode',
    ];

    public function donatur()
    {
        return $this->belongsTo(Donatur::class);
    }

    public function zisco()
    {
        return $this->belongsTo(Zisco::class);
    }

    public function jenisDonasi()
    {
        return $this->belongsTo(JenisDonasi::class);
    }

    public function kwitansi()
    {
        return $this->hasOne(Kwitansi::class);
    }
}
