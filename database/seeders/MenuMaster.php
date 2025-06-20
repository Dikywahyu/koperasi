<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuMaster extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentId = Menu::max('id') ?? 0;
        $id = $currentId + 1;

        // Menu Utama: Master
        $master = Menu::create([
            'id' => $id++,
            'title' => 'Master',
            'icon' => 'ri-database-2-line',
            'route' => null,
            'order' => $id,
            'permission_id' => 1,
        ]);

        // Submenu langsung di bawah Master
        $subs = [
            ['perusahaan', 'Perusahaan', 'ri-community-line'],
            ['jenis-usaha', 'Jenis Usaha', 'ri-shopping-bag-line'],
            ['tipe-dokumen', 'Anggota', 'ri-id-card-line'],
            ['pelanggan', 'Tipe Dokumen', 'ri-layout-top-2-line'],
            ['pemasok', 'Pelanggan', 'ri-vip-crown-line'],
            ['dataasset', 'Pemasok', 'ri-shopping-basket-line'],
            ['anggotaprofiles', 'Assets', 'ri-roadster-line'],
        ];

        foreach ($subs as [$route, $title, $icon]) {
            Menu::create([
                'id' => $id++,
                'title' => $title,
                'icon' => $icon,
                'route' => $route,
                'parent_id' => $master->id,
                'order' => $id,
                'permission_id' => 1,
            ]);
        }

        // SP Menu (child dari Master)
        $sp = Menu::create([
            'id' => $id++,
            'title' => 'SP',
            'icon' => 'ri-hand-heart-line',
            'route' => null,
            'parent_id' => $master->id,
            'order' => $id,
            'permission_id' => 1,
        ]);

        foreach (['Simpanan', 'Pinjaman'] as $title) {
            Menu::create([
                'id' => $id++,
                'title' => $title,
                'icon' => 'ri-circle-fill',
                'route' =>   strtolower($title),
                'parent_id' => $sp->id,
                'order' => $id,
                'permission_id' => 1,
            ]);
        }
    }
}
