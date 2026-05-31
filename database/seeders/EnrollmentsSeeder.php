<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Training;
use App\Models\Enrollment;

class EnrollmentsSeeder extends Seeder
{
    public function run(): void
    {
        $student = User::where('role', 'student')->first();
        $training = Training::first();

        if (!$student || !$training) return;

        Enrollment::updateOrCreate(
            ['user_id' => $student->id, 'training_id' => $training->id],
            ['status' => 'active', 'progress_percent' => 15]
        );
    }
}
