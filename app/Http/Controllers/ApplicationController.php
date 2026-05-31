<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Training;
use App\Mail\ApplicationReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{
    public function create(Training $training)
    {
        return view('applications.create', compact('training'));
    }

    public function store(Request $request, Training $training)
    {
        $data = $request->validate([
            'full_name' => ['required','string','max:255'],
            'email'     => ['required','email','max:255'],
            'phone'     => ['nullable','string','max:30'],
            'cv'        => ['nullable','file','mimes:pdf,doc,docx','max:2048'],
            'diploma'   => ['nullable','file','mimes:pdf,jpg,jpeg,png','max:2048'],
        ]);

        $cvPath = null;
        $dipPath = null;

        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('applications/cv', 'public');
        }
        if ($request->hasFile('diploma')) {
            $dipPath = $request->file('diploma')->store('applications/diplomas', 'public');
        }

        $application = Application::create([
            'training_id' => $training->id,
            'user_id' => auth()->id(),
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'cv_path' => $cvPath,
            'diploma_path' => $dipPath,
            'status' => 'pending',
        ]);

        Mail::to($application->email)->send(new ApplicationReceived($application));

        return redirect()->route('trainings.show', $training)->with('success', 'Candidature envoyée. Vérifie ton email.');
    }
}

