<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::with('training')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('student.dashboard', compact('enrollments'));
    }
}

