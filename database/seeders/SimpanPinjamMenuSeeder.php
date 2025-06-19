<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class SimpanPinjamMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menu Utama
        $main = Menu::create([
            'title' => 'Simpan Pinjam',
            'icon' => 'ri-hand-heart-line',
            'route' => null,
            'parent_id' => null,
            'order' => 1,
            'permission_id' => 1,
        ]);

        // Submenu Simpanan
        $simpanan = Menu::create([
            'title' => 'Simpanan',
            'icon' => 'ri-bank-line',
            'route' => null,
            'parent_id' => $main->id,
            'order' => 1,
            'permission_id' => 1,
        ]);

        Menu::create([
            'title' => 'Setor Simpanan',
            'icon' => 'ri-circle-fill',
            'route' => 'setor.simpanan',
            'parent_id' => $simpanan->id,
            'order' => 1,
            'permission_id' => 1,
        ]);

        Menu::create([
            'title' => 'Penarikan',
            'icon' => 'ri-circle-fill',
            'route' => 'penarikan.simpanan',
            'parent_id' => $simpanan->id,
            'order' => 2,
            'permission_id' => 1,
        ]);

        // Submenu Pinjaman
        $pinjaman = Menu::create([
            'title' => 'Pinjaman',
            'icon' => 'ri-article-line',
            'route' => null,
            'parent_id' => $main->id,
            'order' => 2,
            'permission_id' => 1,
        ]);

        Menu::create([
            'title' => 'Pengajuan Pinjaman',
            'icon' => 'ri-circle-fill',
            'route' => 'pengajuan.pinjaman',
            'parent_id' => $pinjaman->id,
            'order' => 1,
            'permission_id' => 1,
        ]);

        Menu::create([
            'title' => 'Approval Pinjaman',
            'icon' => 'ri-circle-fill',
            'route' => 'approval.pinjaman',
            'parent_id' => $pinjaman->id,
            'order' => 2,
            'permission_id' => 1,
        ]);

        // Menu Langsung (tanpa submenu)
        Menu::create([
            'title' => 'Kartu Anggota',
            'icon' => 'ri-id-card-line',
            'route' => 'kartu.anggota',
            'parent_id' => $main->id,
            'order' => 3,
            'permission_id' => 1,
        ]);

        Menu::create([
            'title' => 'Posting SHU',
            'icon' => 'ri-money-dollar-box-fill',
            'route' => 'posting.shu',
            'parent_id' => $main->id,
            'order' => 4,
            'permission_id' => 1,
        ]);
    }
}
