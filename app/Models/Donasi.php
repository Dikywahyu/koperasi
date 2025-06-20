<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'kode_donatur', 'alamat', 'kontak'];

    public function donasis()
    {
        return $this->hasMany(Donasi::class);
    }
}
