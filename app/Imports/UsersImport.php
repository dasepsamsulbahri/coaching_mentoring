<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = User::create([
            'id'       => $row[0], 
            'nip'      => $row[1], 
            'email'    => $row[2], 
            'name'     => $row[3],
            'password' => Hash::make($row[4]),
            'image'    => $row[5],
        ]);

        $user->assignRole('Peserta');
    }
}
