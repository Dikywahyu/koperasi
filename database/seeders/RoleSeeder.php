<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //// Buat daftar role yang ingin ditambahkan
        $roles = [
            'Super Admin',
            'Admin',
            'Karyawan',
            'BAAK',
            'BAUK',
            'Sarpras',
            'Koperasi',
            'Kaprodi',
            'Dosen Wali',
            'Mahasiswa',
            'Dosen',
            'User'
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }
    }
}
