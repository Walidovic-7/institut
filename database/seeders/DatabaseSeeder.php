<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,        // crée le compte admin
            UsersSeeder::class,        // crée formateur + stagiaire
            TrainingsSeeder::class,    // crée les formations
            CoursesSeeder::class,      // crée cours + contenus
            EnrollmentsSeeder::class,  // inscrit le stagiaire à une formation
        ]);
    }
}

