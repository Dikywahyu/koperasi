<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'route',
        'icon',
        'parent_id',
        'order',
        'permission_id',
    ];

    /**
     * Relasi ke permission (Spatie)
     */
    public function permission()
    {
        return $this->belongsTo(\Spatie\Permission\Models\Permission::class);
    }

    /**
     * Relasi ke parent menu
     */
    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    /**
     * Relasi ke submenu (anak)
     */
    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }
}
