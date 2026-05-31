<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Enrollment;
use App\Models\User;
use App\Mail\ApplicationStatusChanged;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApplicationAdminController extends Controller
{
    public function index()
    {
        $applications = Application::with('training')->latest()->paginate(15);
        return view('admin.applications.index', compact('applications'));
    }

    public function updateStatus(Request $request, Application $application)
    {
        $data = $request->validate([
            'status' => ['required','in:pending,accepted,rejected'],
            'notes_admin' => ['nullable','string'],
        ]);

        $application->update($data);

        // Si accepté => inscription dans enrollments (si user existe)
        if ($data['status'] === 'accepted') {
            if ($application->user_id) {
                Enrollment::updateOrCreate(
                    ['user_id' => $application->user_id, 'training_id' => $application->training_id],
                    ['status' => 'active', 'progress_percent' => 0]
                );
            }
        }

        Mail::to($application->email)->send(new ApplicationStatusChanged($application));

        return back()->with('success', 'Statut mis à jour + email envoyé.');
    }
}

