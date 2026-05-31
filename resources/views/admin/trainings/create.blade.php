<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-2xl text-blue-800 leading-tight">
            Ajouter une formation
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        @if ($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-red-700">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            method="POST"
            action="{{ route('admin.trainings.store') }}"
            enctype="multipart/form-data"
            class="bg-white border border-gray-200 rounded-3xl p-8 space-y-6 shadow-sm"
        >
            @csrf

            <!-- Titre -->
            <div>
                <label class="block font-semibold mb-1">Titre</label>
                <input
                    type="text"
                    name="title"
                    value="{{ old('title') }}"
                    class="w-full rounded-xl border border-gray-300 p-3"
                    required
                >
            </div>

            <!-- Domaine + Niveau -->
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-semibold mb-1">Domaine</label>
                    <select name="domain" class="w-full rounded-xl border border-gray-300 p-3" required>
                        <option value="">-- Choisir --</option>
                        <option value="Langues" {{ old('domain') === 'Langues' ? 'selected' : '' }}>Langues</option>
                        <option value="Informatique" {{ old('domain') === 'Informatique' ? 'selected' : '' }}>Informatique</option>
                        <option value="Marketing" {{ old('domain') === 'Marketing' ? 'selected' : '' }}>Marketing</option>
                        <option value="Management" {{ old('domain') === 'Management' ? 'selected' : '' }}>Management</option>
                    </select>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Niveau</label>
                    <select name="level" class="w-full rounded-xl border border-gray-300 p-3" required>
                        <option value="">-- Choisir --</option>
                        <option value="Débutant" {{ old('level') === 'Débutant' ? 'selected' : '' }}>Débutant</option>
                        <option value="Intermédiaire" {{ old('level') === 'Intermédiaire' ? 'selected' : '' }}>Intermédiaire</option>
                        <option value="Avancé" {{ old('level') === 'Avancé' ? 'selected' : '' }}>Avancé</option>
                    </select>
                </div>
            </div>

            <!-- Durée + Prix -->
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-semibold mb-1">Durée (heures)</label>
                    <input
                        type="number"
                        name="duration_hours"
                        value="{{ old('duration_hours') }}"
                        min="1"
                        class="w-full rounded-xl border border-gray-300 p-3"
                        required
                    >
                </div>

                <div>
                    <label class="block font-semibold mb-1">Prix (DA)</label>
                    <input
                        type="number"
                        name="price"
                        value="{{ old('price') }}"
                        min="0"
                        step="1"
                        class="w-full rounded-xl border border-gray-300 p-3"
                        required
                    >
                </div>
            </div>

            <!-- Image -->
            <div>
                <label class="block font-semibold mb-1">Image de la formation</label>
                <input
                    type="file"
                    name="image"
                    accept="image/*"
                    class="w-full rounded-xl border border-gray-300 p-3"
                >
                <p class="text-sm text-gray-500 mt-1">
                    JPG, PNG ou WebP — max 2MB
                </p>
            </div>

            <!-- Description -->
            <div>
                <label class="block font-semibold mb-1">Description</label>
                <textarea
                    name="description"
                    rows="4"
                    class="w-full rounded-xl border border-gray-300 p-3"
                >{{ old('description') }}</textarea>
            </div>

            <!-- Objectifs -->
            <div>
                <label class="block font-semibold mb-1">Objectifs</label>
                <textarea
                    name="objectives"
                    rows="3"
                    class="w-full rounded-xl border border-gray-300 p-3"
                >{{ old('objectives') }}</textarea>
            </div>

            <!-- Programme -->
            <div>
                <label class="block font-semibold mb-1">Programme</label>
                <textarea
                    name="program"
                    rows="4"
                    class="w-full rounded-xl border border-gray-300 p-3"
                >{{ old('program') }}</textarea>
            </div>

            <!-- Prérequis -->
            <div>
                <label class="block font-semibold mb-1">Prérequis</label>
                <textarea
                    name="prerequisites"
                    rows="2"
                    class="w-full rounded-xl border border-gray-300 p-3"
                >{{ old('prerequisites') }}</textarea>
            </div>

            <!-- Certification -->
            <div>
                <label class="block font-semibold mb-1">Certification</label>
                <input
                    type="text"
                    name="certification"
                    value="{{ old('certification') }}"
                    class="w-full rounded-xl border border-gray-300 p-3"
                >
            </div>

            <!-- ✅ Formation phare (CORRIGÉ) -->
            <div class="flex items-center gap-2">
                <!-- Si décoché => envoie 0 -->
                <input type="hidden" name="is_featured" value="0">

                <!-- Si coché => envoie 1 -->
                <input
                    type="checkbox"
                    name="is_featured"
                    id="is_featured"
                    value="1"
                    class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                    {{ old('is_featured') ? 'checked' : '' }}
                >

                <label for="is_featured" class="font-semibold">
                    Formation phare (page d’accueil)
                </label>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end gap-3 pt-4">
                <a
                    href="{{ route('admin.trainings.index') }}"
                    class="px-5 py-3 rounded-xl border border-gray-300 text-gray-700 font-semibold hover:bg-gray-50"
                >
                    Annuler
                </a>

                <button
                    type="submit"
                    class="px-6 py-3 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700"
                >
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
