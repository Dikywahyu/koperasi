<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'no_anggota',
        'nik',
        'no_kk',
        'jenis_kelamin',
        'tanggal_lahir',
        'tempat_lahir',
        'telepon',
        'alamat',
        'pekerjaan',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
