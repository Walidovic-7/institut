<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <h1 class="text-2xl font-extrabold text-gray-900 mb-6">
            Catalogue des formations
        </h1>

        <!-- Filtres -->
        <form method="GET" class="grid md:grid-cols-4 gap-3 mb-8">
            <select name="domain" class="border rounded-xl p-3">
                <option value="">Domaine</option>
                @foreach($domains as $d)
                    <option value="{{ $d }}" @selected(request('domain') == $d)>
                        {{ $d }}
                    </option>
                @endforeach
            </select>

            <select name="level" class="border rounded-xl p-3">
                <option value="">Niveau</option>
                @foreach($levels as $l)
                    <option value="{{ $l }}" @selected(request('level') == $l)>
                        {{ $l }}
                    </option>
                @endforeach
            </select>

            <input
                type="number"
                name="duration"
                value="{{ request('duration') }}"
                class="border rounded-xl p-3"
                placeholder="Durée max (h)"
            >

            <button class="bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700">
                Filtrer
            </button>
        </form>

        <!-- Liste des formations -->
        <div class="grid md:grid-cols-3 gap-6">
            @forelse($trainings as $t)
                <a
                    href="{{ route('trainings.show', $t->slug) }}"
                    class="group rounded-3xl border border-gray-200 bg-white p-5 hover:shadow-lg transition"
                >
                    <!-- Image -->
                    <img
                        src="{{ $t->image
                            ? asset('storage/'.$t->image)
                            : asset('images/default-training.jpg') }}"
                        alt="{{ $t->title }}"
                        class="w-full h-40 object-cover rounded-2xl mb-4 border group-hover:scale-[1.02] transition"
                    >

                    <!-- Badges -->
                    <div class="flex items-center justify-between text-xs mb-2">
                        <div class="flex gap-2">
                            <span class="px-2 py-1 rounded-full bg-blue-50 text-blue-700 font-semibold">
                                {{ $t->domain }}
                            </span>
                            <span class="px-2 py-1 rounded-full bg-gray-100 text-gray-700 font-semibold">
                                {{ $t->level }}
                            </span>
                        </div>

                        <span class="font-bold text-gray-900">
                            {{ number_format($t->price, 0, '.', ' ') }} DA
                        </span>
                    </div>

                    <!-- Titre -->
                    <h3 class="mt-2 font-extrabold text-gray-900 text-lg">
                        {{ $t->title }}
                    </h3>

                    <!-- Description -->
                    <p class="mt-2 text-sm text-gray-600">
                        {{ \Illuminate\Support\Str::limit($t->description, 90) }}
                    </p>

                    <!-- Footer -->
                    <div class="mt-4 flex items-center justify-between text-sm">
                        <span class="text-gray-500">
                            {{ $t->duration_hours }}h
                        </span>

                        <span class="font-semibold text-blue-700 group-hover:text-blue-800">
                            Voir détails →
                        </span>
                    </div>
                </a>
            @empty
                <div class="col-span-3 text-center text-gray-500">
                    Aucune formation trouvée.
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $trainings->links() }}
        </div>
    </div>
</x-app-layout>
