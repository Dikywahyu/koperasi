<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = [
            'menu'          => ['lihat', 'tambah', 'ubah', 'import', 'hapus', 'hapusall'],
            'user'          => ['lihat', 'ubah', 'tambah', 'hapus'],
            'permission'    => ['lihat', 'ubah', 'tambah', 'hapus'],
            'role'          => ['lihat', 'ubah', 'tambah', 'hapus'],
            'loguser'       => ['lihat', 'ubah', 'tambah', 'hapus'],
        ];

        foreach ($permissions as $prefix => $actions) {
            foreach ($actions as $action) {
                Permission::firstOrCreate([
                    'name' => "$prefix.$action",
                ]);
            }
        }
    }
}
