<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index(Request $request)
    {
        $q = Training::query();

        if ($request->filled('domain')) $q->where('domain', $request->domain);
        if ($request->filled('level')) $q->where('level', $request->level);

        if ($request->filled('duration')) {
            // ex duration=20 => formations <= 20 heures
            $q->where('duration_hours', '<=', (int)$request->duration);
        }

        $trainings = $q->latest()->paginate(9)->withQueryString();

        $domains = Training::query()->select('domain')->distinct()->orderBy('domain')->pluck('domain');
        $levels  = Training::query()->select('level')->distinct()->orderBy('level')->pluck('level');

        return view('trainings.index', compact('trainings','domains','levels'));
    }

    public function show(Training $training)
    {
        $training->load(['courses.contents']);
        return view('trainings.show', compact('training'));
    }
}
