<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserCredential extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'raw_data'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
