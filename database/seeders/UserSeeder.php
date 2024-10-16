<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    public function run(): void
    {
        $roleSuperAdmin = User::create([
            'nip'       => 199701042024211002,
            'name'      =>'Dasep Samsul Bahri',
            'email'     =>'bahridaseps@gmail.com',
            'password'  => bcrypt('bpsdm123'),
        ]);
        $roleSuperAdmin->assignRole('Super Admin');

        $roleAdmin = User::create([
            'nip'       => 199706232022031004,
            'name'      =>'T. Irfan Megat Wira',
            'email'     =>'irfan@gmail.com',
            'password'  => bcrypt('bpsdm123'),
        ]);
        $roleAdmin->assignRole('Admin');

        // $roleMentor = User::create([
        //     'nip'       => 198911292015031002,
        //     'name'      =>'Ari Fauzi Mukti Nugroho',
        //     'email'     =>'irfan@gmail.com',
        //     'password'  =>bcrypt('bpsdm123'),
        //     'file'      => 'default.jpg'
        // ]);
        // $roleMentor->assignRole('Mentor');
    }
}
