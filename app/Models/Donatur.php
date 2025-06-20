<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'instansi_id',
        'nama',
        'kode_donatur',
        'alamat',
        'kontak',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function instansi()
    {
        return $this->belongsTo(Instansi::class);
    }

    public function donasis()
    {
        return $this->hasMany(Donasi::class);
    }
}
