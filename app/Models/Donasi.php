<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'donatur_id',
        'jenis_donasi_id',
        'zisco_id',
        'nominal',
        'bulan_donasi',
        'metode',
        'status'
    ];

    /**
     * Relasi ke donatur
     */
    public function donatur()
    {
        return $this->belongsTo(Donatur::class);
    }

    /**
     * Relasi ke jenis donasi
     */
    public function jenisDonasi()
    {
        return $this->belongsTo(JenisDonasi::class);
    }

    /**
     * Relasi ke zisco (jika zisco_id disimpan di donasis)
     */
    public function zisco()
    {
        return $this->belongsTo(Zisco::class);
    }

    /**
     * Relasi ke kwitansi
     */
    public function kwitansi()
    {
        return $this->hasOne(Kwitansi::class);
    }
}
