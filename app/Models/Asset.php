<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kode',
        'kategori',
        'jumlah',
        'tanggal_beli',
    ];

    protected $casts = [
        'tanggal_beli' => 'date',
    ];
}
