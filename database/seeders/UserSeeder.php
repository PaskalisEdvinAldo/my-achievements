<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nickname' => 'Administator',
            'email' => 'administrator@gmail.com',
            'password' => Hash::make('Inorasi2024'),
            'is_admin' => true,
        ]);
    }
}