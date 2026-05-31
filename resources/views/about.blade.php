<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-2xl text-blue-800 leading-tight">
            À propos de l’institut
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Intro -->
        <div class="rounded-3xl bg-white border border-blue-100 p-8 shadow-sm">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-sm font-semibold">
                Institut de Formation
            </div>

            <h1 class="mt-4 text-3xl sm:text-4xl font-extrabold text-gray-900">
                Notre mission : rendre les compétences accessibles.
            </h1>

            <p class="mt-4 text-gray-600 leading-relaxed max-w-3xl">
                Nous proposons des formations pratiques et orientées métier, avec supports (PDF, vidéos),
                suivi de progression et certification en fin de parcours. Notre équipe pédagogique accompagne
                chaque apprenant pour garantir des résultats concrets.
            </p>

            <div class="mt-6 flex flex-wrap gap-3">
                <a href="{{ route('trainings.index') }}"
                   class="px-5 py-3 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700">
                    Voir les formations
                </a>
                <a href="{{ route('contact.show') }}"
                   class="px-5 py-3 rounded-xl border border-gray-200 bg-white text-gray-900 font-semibold hover:bg-gray-50">
                    Nous contacter
                </a>
            </div>
        </div>

        <!-- Mission / Vision -->
        <div class="mt-8 grid md:grid-cols-2 gap-6">
            <div class="rounded-2xl bg-white border border-gray-200 p-6">
                <h3 class="text-xl font-extrabold text-gray-900">Mission</h3>
                <p class="mt-2 text-gray-600">
                    Offrir des formations modernes, pratiques, adaptées au marché et accessibles à tous.
                </p>
            </div>

            <div class="rounded-2xl bg-white border border-gray-200 p-6">
                <h3 class="text-xl font-extrabold text-gray-900">Vision</h3>
                <p class="mt-2 text-gray-600">
                    Devenir une référence en formation professionnelle grâce à un accompagnement de qualité
                    et des certifications reconnues.
                </p>
            </div>
        </div>

        <!-- Team -->
        <div class="mt-10">
            <h2 class="text-2xl font-extrabold text-gray-900">Équipe pédagogique</h2>
            <p class="mt-2 text-gray-600">Des formateurs expérimentés et passionnés.</p>

            <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach([
                    ['name' => 'Formateur 1', 'role' => 'Développement Web'],
                    ['name' => 'Formateur 2', 'role' => 'Data / Bureautique'],
                    ['name' => 'Formateur 3', 'role' => 'Gestion de projet'],
                ] as $m)
                    <div class="rounded-2xl bg-white border border-gray-200 p-6">
                        <div class="w-12 h-12 rounded-xl bg-blue-600 text-white flex items-center justify-center font-extrabold">
                            {{ strtoupper(substr($m['name'], 0, 1)) }}
                        </div>
                        <div class="mt-4 font-extrabold text-gray-900">{{ $m['name'] }}</div>
                        <div class="text-sm text-gray-600">{{ $m['role'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Certifications -->
        <div class="mt-10 rounded-2xl bg-white border border-gray-200 p-6">
            <h2 class="text-2xl font-extrabold text-gray-900">Agréments / Certifications</h2>
            <p class="mt-2 text-gray-600">
                Nous délivrons des attestations et certificats selon les parcours. (Ajoute ici tes vrais agréments)
            </p>

            <div class="mt-4 grid sm:grid-cols-3 gap-4">
                <div class="p-4 rounded-xl bg-blue-50 border border-blue-100 text-blue-800 font-semibold">Certification A</div>
                <div class="p-4 rounded-xl bg-blue-50 border border-blue-100 text-blue-800 font-semibold">Certification B</div>
                <div class="p-4 rounded-xl bg-blue-50 border border-blue-100 text-blue-800 font-semibold">Certification C</div>
            </div>
        </div>
    </div>
</x-app-layout>
