<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name'      => 'admin',
                'email'     => 'admin@gmail.com',
                'password'  =>  Hash::make('admin'),
            ],
        ];

        foreach ($user as $key => $val) {
            User::updateOrCreate($val);
        }
    }
}
