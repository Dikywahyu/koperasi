<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tanggal_pengajuan',
        'jumlah_pinjaman',
        'tenor_bulan',
        'bunga',
        'status',
        'tanggal_disetujui',
        'keterangan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function angsuran()
    {
        return $this->hasMany(Angsuran::class);
    }

    public function transaksi()
    {
        return $this->morphOne(Transaksi::class, 'transaksible');
    }
}
