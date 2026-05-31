<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use App\Models\Course;

class TrainerDashboardController extends Controller
{
    public function index()
    {
        $courses = Course::with('training')
            ->where('trainer_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('trainer.dashboard', compact('courses'));
    }
}
