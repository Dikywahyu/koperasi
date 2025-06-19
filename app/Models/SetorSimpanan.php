<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetorSimpanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'jumlah',
        'keterangan',
        'tanggal_setor',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
