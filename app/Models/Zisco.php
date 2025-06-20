<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zisco extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cabang_id',
        'nama',
        'lokasi',
    ];

    /**
     * Relasi ke user (pemilik akun)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke cabang
     */
    public function cabang()
    {
        return $this->belongsTo(Cabang::class);
    }

    /**
     * Relasi ke donatur
     */
    public function donaturs()
    {
        return $this->hasMany(Donatur::class);
    }

    /**
     * Relasi ke donasi (jika ada zisco_id di donasis)
     */
    public function donasis()
    {
        return $this->hasMany(Donasi::class);
    }
}
