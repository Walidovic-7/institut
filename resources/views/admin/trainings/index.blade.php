<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-extrabold text-2xl text-blue-800 leading-tight">
                Formations (Admin)
            </h2>

            <a href="{{ route('admin.trainings.create') }}"
               class="px-4 py-2 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700">
                ➕ Ajouter une formation
            </a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        @if(session('success'))
            <div class="mb-6 rounded-xl border border-green-200 bg-green-50 p-4 text-green-800">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white border border-gray-200 rounded-3xl shadow-sm overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-blue-50 text-blue-900">
                    <tr>
                        <th class="p-4 text-left">Image</th>
                        <th class="p-4 text-left">Titre</th>
                        <th class="p-4 text-left">Domaine</th>
                        <th class="p-4 text-left">Niveau</th>
                        <th class="p-4 text-left">Durée</th>
                        <th class="p-4 text-left">Prix</th>
                        <th class="p-4 text-left">Phare</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse($trainings as $t)
                        <tr class="hover:bg-gray-50">
                            <td class="p-4">
                                <img
                                    src="{{ $t->image ? asset('storage/'.$t->image) : asset('images/default-training.jpg') }}"
                                    class="h-12 w-20 rounded-lg object-cover border"
                                    alt="{{ $t->title }}"
                                >
                            </td>

                            <td class="p-4 font-semibold text-gray-900">
                                {{ $t->title }}
                                <div class="text-xs text-gray-500 mt-1">
                                    slug: {{ $t->slug ?? '—' }}
                                </div>
                            </td>

                            <td class="p-4">{{ $t->domain }}</td>
                            <td class="p-4">{{ $t->level }}</td>
                            <td class="p-4">{{ $t->duration_hours }}h</td>
                            <td class="p-4">{{ number_format($t->price, 0, '.', ' ') }} DA</td>

                            <td class="p-4">
                                @if($t->is_featured)
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                        Oui
                                    </span>
                                @else
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-600">
                                        Non
                                    </span>
                                @endif
                            </td>

                            <td class="p-4">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.trainings.edit', $t) }}"
                                       class="px-3 py-2 rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 font-semibold">
                                        Modifier
                                    </a>

                                    <form method="POST" action="{{ route('admin.trainings.destroy', $t) }}"
                                          onsubmit="return confirm('Supprimer cette formation ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-3 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700 font-semibold">
                                            Supprimer
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="p-6 text-center text-gray-500">
                                Aucune formation pour le moment.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $trainings->links() }}
        </div>
    </div>
</x-app-layout>
