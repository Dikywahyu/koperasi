<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisDonasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jenis',
        'deskripsi',
    ];

    /**
     * Relasi ke banyak donasi
     */
    public function donasis()
    {
        return $this->hasMany(Donasi::class);
    }
}
