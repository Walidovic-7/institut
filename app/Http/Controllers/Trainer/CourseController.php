<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Training;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('training')
            ->where('trainer_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('trainer.courses.index', compact('courses'));
    }

    public function create()
    {
        $trainings = Training::orderBy('title')->get();
        return view('trainer.courses.create', compact('trainings'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'training_id' => ['required','exists:trainings,id'],
            'title' => ['required','string','max:255'],
            'description' => ['nullable','string'],
            'order_index' => ['nullable','integer','min:0'],
        ]);

        $data['trainer_id'] = auth()->id();
        Course::create($data);

        return redirect()->route('trainer.courses.index')->with('success','Cours créé.');
    }

    public function edit(Course $course)
    {
        abort_if($course->trainer_id !== auth()->id(), 403);
        $trainings = Training::orderBy('title')->get();
        return view('trainer.courses.edit', compact('course','trainings'));
    }

    public function update(Request $request, Course $course)
    {
        abort_if($course->trainer_id !== auth()->id(), 403);

        $data = $request->validate([
            'training_id' => ['required','exists:trainings,id'],
            'title' => ['required','string','max:255'],
            'description' => ['nullable','string'],
            'order_index' => ['nullable','integer','min:0'],
        ]);

        $course->update($data);

        return redirect()->route('trainer.courses.index')->with('success','Cours mis à jour.');
    }

    public function destroy(Course $course)
    {
        abort_if($course->trainer_id !== auth()->id(), 403);
        $course->delete();
        return back()->with('success','Cours supprimé.');
    }
}
