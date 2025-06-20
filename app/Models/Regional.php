<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Regional extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kode',
    ];

    protected static function booted()
    {
        static::creating(function ($regional) {
            if (empty($regional->kode)) {
                $regional->kode = 'REG-' . strtoupper(Str::random(6));
            }
        });
    }


    /**
     * Relasi ke banyak cabang
     */
    public function cabangs()
    {
        return $this->hasMany(Cabang::class);
    }
}
