<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [[
            'name'           => 'admin',
            'email'          => 'mixartemev@gmail.com',
            'password'       => Hash::make('password'),
        ]];

        User::insert($users);
    }
}
