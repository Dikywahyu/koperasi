<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

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
                $bulanDonasi = $kwitansi->bulan_donasi ?? now();
                $dateCode = Carbon::parse($bulanDonasi)->format('Ym');
                $donasiPart = 'D' . str_pad($kwitansi->donasi_id ?? 0, 4, '0', STR_PAD_LEFT);

                do {
                    $random = strtoupper(Str::random(6));
                    $nomor = $prefix . $dateCode . $donasiPart . $random;
                } while (self::where('nomor_transaksi', $nomor)->exists());

                $kwitansi->nomor_transaksi = $nomor;
            }
        });
    }

    public function donasi()
    {
        return $this->belongsTo(Donasi::class);
    }
}
