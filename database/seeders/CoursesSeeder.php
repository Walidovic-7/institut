<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Training;
use App\Models\Course;
use App\Models\CourseContent;

class CoursesSeeder extends Seeder
{
    public function run(): void
    {
        $trainer = User::where('role', 'trainer')->first();
        if (!$trainer) return;

        $training = Training::first();
        if (!$training) return;

        $course1 = Course::create([
            'training_id' => $training->id,
            'trainer_id' => $trainer->id,
            'title' => 'Introduction',
            'description' => 'Présentation du cours et objectifs.',
            'order_index' => 1,
        ]);

        CourseContent::create([
            'course_id' => $course1->id,
            'type' => 'link',
            'title' => 'Lien de démarrage',
            'path_or_url' => 'https://laravel.com/docs',
        ]);

        $course2 = Course::create([
            'training_id' => $training->id,
            'trainer_id' => $trainer->id,
            'title' => 'Chapitre 1',
            'description' => 'Premiers concepts.',
            'order_index' => 2,
        ]);

        CourseContent::create([
            'course_id' => $course2->id,
            'type' => 'video',
            'title' => 'Vidéo introduction',
            'path_or_url' => 'https://www.youtube.com/',
        ]);
    }
}
