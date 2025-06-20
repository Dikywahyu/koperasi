<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Cabang extends Model
{
    use HasFactory;

    protected $fillable = [
        'regional_id',
        'nama',
        'kode',
        'alamat',
        'telepon',
    ];

    protected static function booted()
    {
        static::creating(function ($cabang) {
            if (empty($cabang->kode)) {
                $cabang->kode = 'CAB-' . strtoupper(Str::random(6));
            }
        });
    }


    /**
     * Relasi ke regional
     */
    public function regional()
    {
        return $this->belongsTo(Regional::class);
    }

    /**
     * Relasi ke banyak zisco
     */
    public function ziscos()
    {
        return $this->hasMany(Zisco::class);
    }
}
