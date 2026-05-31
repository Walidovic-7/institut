<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseContent;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function store(Request $request, Course $course)
    {
        abort_if($course->trainer_id !== auth()->id(), 403);

        $data = $request->validate([
            'type' => ['required','in:pdf,video,link,file'],
            'title' => ['required','string','max:255'],
            'file'  => ['nullable','file','max:10240'], // 10 MB
            'url'   => ['nullable','url','max:2048'],
        ]);

        $pathOrUrl = null;

        if (in_array($data['type'], ['pdf','file'], true)) {
            if (!$request->hasFile('file')) {
                return back()->withErrors(['file' => 'Fichier requis pour ce type.']);
            }
            $pathOrUrl = $request->file('file')->store('course_contents', 'public');
        } else {
            if (empty($data['url'])) {
                return back()->withErrors(['url' => 'URL requise pour ce type.']);
            }
            $pathOrUrl = $data['url'];
        }

        CourseContent::create([
            'course_id' => $course->id,
            'type' => $data['type'],
            'title' => $data['title'],
            'path_or_url' => $pathOrUrl,
        ]);

        return back()->with('success', 'Contenu ajouté.');
    }
}
