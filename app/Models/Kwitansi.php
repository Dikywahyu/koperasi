<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kwitansi extends Model
{
    use HasFactory;
    protected $fillable = [
        'donasi_id',
        'nomor_transaksi',
        'total',
        'komisi_zisco',
        'dicetak',
        'bulan_donasi',
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($kwitansi) {
            if (empty($kwitansi->nomor_transaksi)) {
                $prefix = 'KW';

                $bulanDonasi = $kwitansi->bulan_donasi ?? now(); // fallback ke now() kalau belum ada
                $dateCode = \Carbon\Carbon::parse($bulanDonasi)->format('Ym'); // 202506

                $donasiPart = 'D' . str_pad($kwitansi->donasi_id ?? 0, 4, '0', STR_PAD_LEFT); // D0015
                $random = strtoupper(Str::random(6)); // ABC123

                $kwitansi->nomor_transaksi = $prefix . $dateCode . $donasiPart . $random;
            }
        });
    }

    public function donasi()
    {
        return $this->belongsTo(Donasi::class);
    }
}
