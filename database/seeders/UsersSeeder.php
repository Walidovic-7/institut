<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@institut.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'phone' => '0550000000',
            ]
        );

        User::updateOrCreate(
            ['email' => 'trainer@institut.com'],
            [
                'name' => 'Formateur',
                'password' => Hash::make('password123'),
                'role' => 'trainer',
                'phone' => '0660000000',
            ]
        );

        User::updateOrCreate(
            ['email' => 'student@institut.com'],
            [
                'name' => 'Stagiaire',
                'password' => Hash::make('password123'),
                'role' => 'student',
                'phone' => '0770000000',
            ]
        );
    }
}

