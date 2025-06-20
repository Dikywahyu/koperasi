<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'alamat', 'telepon', 'penanggung_jawab_id'];

    public function penanggungJawab()
    {
        return $this->belongsTo(Donatur::class, 'penanggung_jawab_id');
    }

    public function donaturs()
    {
        return $this->hasMany(Donatur::class);
    }
}
