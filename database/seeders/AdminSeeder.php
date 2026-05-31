<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // clé unique => match
            [
                'name' => 'Admin',
                'password' => Hash::make(env('ADMIN_PASSWORD', 'Admin@123')),
                'role' => 'admin',
            ]
        );
    }
}
