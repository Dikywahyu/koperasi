<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zisco extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'lokasi'];

    public function donasis()
    {
        return $this->hasMany(Donasi::class);
    }
}
