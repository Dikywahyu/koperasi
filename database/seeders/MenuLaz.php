<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuLaz extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menu Utama: LAZ
        $laz = Menu::create([
            'title' => 'LAZ',
            'route' => null,
            'icon' => 'ri-hand-coin-line',
            'parent_id' => null,
            'order' => 2,
            'permission_id' => 1
        ]);

        // Submenu: Transaksi
        Menu::create([
            'title' => 'Transaksi',
            'route' => 'transaksis',
            'icon' => 'ri-exchange-dollar-line',
            'parent_id' => $laz->id,
            'order' => 1,
            'permission_id' => 1
        ]);

        // Submenu: Zisco
        Menu::create([
            'title' => 'Zisco',
            'route' => 'ziscos',
            'icon' => 'ri-group-line',
            'parent_id' => $laz->id,
            'order' => 2,
            'permission_id' => 1
        ]);

        // Submenu: Jenis Donasi
        Menu::create([
            'title' => 'Jenis Donasi',
            'route' => 'jenis-donasis',
            'icon' => 'ri-donation-line',
            'parent_id' => $laz->id,
            'order' => 3,
            'permission_id' => 1
        ]);

        // Submenu: Instansi
        Menu::create([
            'title' => 'Instansi',
            'route' => 'instansis',
            'icon' => 'ri-building-line',
            'parent_id' => $laz->id,
            'order' => 4,
            'permission_id' => 1
        ]);

        // Submenu: Donatur
        Menu::create([
            'title' => 'Donatur',
            'route' => 'donaturs',
            'icon' => 'ri-user-heart-line',
            'parent_id' => $laz->id,
            'order' => 5,
            'permission_id' => 1
        ]);

        // Submenu: Donasi
        Menu::create([
            'title' => 'Donasi',
            'route' => 'donasis',
            'icon' => 'ri-hand-heart-line',
            'parent_id' => $laz->id,
            'order' => 6,
            'permission_id' => 1
        ]);

        // Submenu: Kwitansi
        Menu::create([
            'title' => 'Kwitansi',
            'route' => 'kwitansis',
            'icon' => 'ri-file-text-line',
            'parent_id' => $laz->id,
            'order' => 7,
            'permission_id' => 1
        ]);
    }
}
