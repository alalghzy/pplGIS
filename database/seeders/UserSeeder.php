<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name'      => 'admin',
                'email'     => 'admin@gmail.com',
                'status'    => 'Administrator',
                'password'  => Hash::make('123456'),
            ],
            [
                'name'      => 'Joko Susanto',
                'email'     => 'joko@gmail.com',
                'status'    => 'Petani',
                'password'  => Hash::make('123456'),
            ],
            [
                'name'      => 'Malidi',
                'email'     => 'malidi@gmail.com',
                'status'    => 'Pembimbing',
                'password'  => Hash::make('123456'),
            ],
            [
                'name'      => 'Anone Chan',
                'email'     => 'anone@gmail.com',
                'status'    => 'Petani',
                'password'  => Hash::make('123456'),
            ],
        ];

        foreach ($users as $userData) {
            User::updateOrCreate(['email' => $userData['email']], $userData);
        }
    }
}

