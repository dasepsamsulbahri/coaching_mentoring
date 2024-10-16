<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'Super Admin'],
            ['name' => 'Admin'],
            ['name' => 'Mentor'],
            ['name' => 'Peserta']
        ];
        
        foreach ($roles as $role) {
            Role::create($role);
        }

        // $permissions = [
        //     ['name' => 'tambah_kegiatan'],
        //     ['name' => 'lihat_kegiatan'],
        //     ['name' => 'edit_kegiatan'],
        //     ['name' => 'hapus_kegiatan'],
        //     ['name' => 'tambah_user'],
        //     ['name' => 'lihat_user'],
        //     ['name' => 'edit_user'],
        //     ['name' => 'hapus_user'],
        // ];
        // foreach ($permissions as $permission) {
        //     Permission::create($permission);
        // }

        // //Hak Akses Admin
        // $roleAdmin = Role::findByName('Admin');
        // $roleAdmin->givePermissionTo([
        //     'tambah_user',
        //     'lihat_user',
        //     'edit_user',
        //     'hapus_user',
        //     'tambah_kegiatan',
        //     'lihat_kegiatan',
        //     'edit_kegiatan',
        //     'hapus_kegiatan',
        // ]);
    }
}
