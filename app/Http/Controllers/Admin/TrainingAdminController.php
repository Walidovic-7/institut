<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TrainingAdminController extends Controller
{
    /**
     * Liste des formations
     */
    public function index()
    {
        $trainings = Training::latest()->paginate(10);
        return view('admin.trainings.index', compact('trainings'));
    }

    /**
     * Formulaire de création
     */
    public function create()
    {
        return view('admin.trainings.create');
    }

    /**
     * Enregistrer une formation
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'domain' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'duration_hours' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'objectives' => 'nullable|string',
            'program' => 'nullable|string',
            'prerequisites' => 'nullable|string',
            'certification' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Slug unique
        $baseSlug = Str::slug($data['title']);
        $slug = $baseSlug;
        $i = 1;

        while (Training::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $i++;
        }

        $data['slug'] = $slug;

        // Checkbox
        $data['is_featured'] = $request->has('is_featured');

        // Upload image
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('trainings', 'public');
        }

        Training::create($data);

        return redirect()
            ->route('admin.trainings.index')
            ->with('success', 'Formation ajoutée avec succès');
    }

    /**
     * Formulaire d’édition
     */
    public function edit(Training $training)
    {
        return view('admin.trainings.edit', compact('training'));
    }

    /**
     * Mettre à jour une formation
     */
    public function update(Request $request, Training $training)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'domain' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'duration_hours' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'objectives' => 'nullable|string',
            'program' => 'nullable|string',
            'prerequisites' => 'nullable|string',
            'certification' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Slug si titre modifié
        if ($training->title !== $data['title']) {
            $baseSlug = Str::slug($data['title']);
            $slug = $baseSlug;
            $i = 1;

            while (Training::where('slug', $slug)->where('id', '!=', $training->id)->exists()) {
                $slug = $baseSlug . '-' . $i++;
            }

            $data['slug'] = $slug;
        }

        $data['is_featured'] = $request->has('is_featured');

        // Nouvelle image
        if ($request->hasFile('image')) {

            // Supprimer l’ancienne image
            if ($training->image) {
                Storage::disk('public')->delete($training->image);
            }

            $data['image'] = $request->file('image')
                ->store('trainings', 'public');
        }

        $training->update($data);

        return back()->with('success', 'Formation mise à jour');
    }

    /**
     * Supprimer une formation
     */
    public function destroy(Training $training)
    {
        if ($training->image) {
            Storage::disk('public')->delete($training->image);
        }

        $training->delete();

        return redirect()
            ->route('admin.trainings.index')
            ->with('success', 'Formation supprimée');
    }
}
