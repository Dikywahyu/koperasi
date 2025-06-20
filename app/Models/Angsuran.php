<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angsuran extends Model
{
    use HasFactory;

    protected $fillable = [
        'pinjaman_id',
        'tanggal_bayar',
        'jumlah_bayar',
        'denda',
        'keterangan',
    ];

    public function pinjaman()
    {
        return $this->belongsTo(Pinjaman::class);
    }

    public function transaksi()
    {
        return $this->morphOne(Transaksi::class, 'transaksible');
    }
}
