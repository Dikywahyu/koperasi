<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Donatur extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'instansi_id',
        'zisco_id',
        'nama',
        'kode_donatur',
        'alamat',
        'kontak',
    ];

    protected static function booted()
    {
        static::creating(function ($donatur) {
            if (empty($donatur->kode_donatur)) {
                $donatur->kode_donatur = 'DON-' . strtoupper(Str::random(8));
            }
        });
    }

    /**
     * Relasi ke user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke instansi
     */
    public function instansi()
    {
        return $this->belongsTo(Instansi::class);
    }

    /**
     * Relasi ke zisco (petugas yang menangani donatur ini)
     */
    public function zisco()
    {
        return $this->belongsTo(Zisco::class);
    }

    /**
     * Relasi ke banyak donasi
     */
    public function donasis()
    {
        return $this->hasMany(Donasi::class);
    }
}
