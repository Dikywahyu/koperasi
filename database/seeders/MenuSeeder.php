<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        // Menu Utama: System
        $system = Menu::create([
            'title' => 'System',
            'route' => null,
            'icon' => 'ri-layout-2-line',
            'parent_id' => null,
            'order' => 1,
            'permission_id' => 1
        ]);

        // Submenu: Menu
        Menu::create([
            'title' => 'Menu',
            'route' => 'menu',
            'icon' => 'ri-layout-top-2-line',
            'parent_id' => $system->id,
            'order' => 1,
            'permission_id' => 1
        ]);

        // Submenu: User Menu
        Menu::create([
            'title' => 'User Menu',
            'route' => 'menuuser',
            'icon' => 'ri-layout-top-2-line',
            'parent_id' => $system->id,
            'order' => 2,
            'permission_id' => 1
        ]);

        // Submenu: Roles & Permissions (dropdown)
        $rolesPermission = Menu::create([
            'title' => 'Roles & Permission',
            'route' => null,
            'icon' => 'ri-shield-user-line',
            'parent_id' => $system->id,
            'order' => 3,
            'permission_id' => 1
        ]);

        Menu::create([
            'title' => 'Roles',
            'route' => 'role',
            'icon' => 'ri-circle-fill',
            'parent_id' => $rolesPermission->id,
            'order' => 1,
            'permission_id' => 1
        ]);

        Menu::create([
            'title' => 'Permission',
            'route' => 'permission',
            'icon' => 'ri-circle-fill',
            'parent_id' => $rolesPermission->id,
            'order' => 2,
            'permission_id' => 1
        ]);

        // Submenu: User
        Menu::create([
            'title' => 'User',
            'route' => 'user',
            'icon' => 'ri-user-line',
            'parent_id' => $system->id,
            'order' => 4,
            'permission_id' => 1
        ]);

        // Submenu: Log History
        Menu::create([
            'title' => 'Log History',
            'route' => 'log',
            'icon' => 'ri-history-line',
            'parent_id' => $system->id,
            'order' => 5,
            'permission_id' => 1
        ]);
    }
}
