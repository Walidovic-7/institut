<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-extrabold text-blue-800">Messages Contact</h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        @if(session('success'))
            <div class="mb-6 rounded-xl border border-green-200 bg-green-50 p-4 text-green-800">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white border border-gray-200 rounded-3xl overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-blue-50 text-blue-900">
                    <tr>
                        <th class="p-4 text-left">Statut</th>
                        <th class="p-4 text-left">Nom</th>
                        <th class="p-4 text-left">Email</th>
                        <th class="p-4 text-left">Sujet</th>
                        <th class="p-4 text-left">Date</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse($messages as $m)
                        <tr class="hover:bg-gray-50">
                            <td class="p-4">
                                @if($m->read_at)
                                    <span class="px-2 py-1 rounded-full text-xs bg-gray-100 text-gray-700 font-semibold">Lu</span>
                                @else
                                    <span class="px-2 py-1 rounded-full text-xs bg-blue-100 text-blue-700 font-semibold">Nouveau</span>
                                @endif
                            </td>

                            <td class="p-4 font-semibold">{{ $m->name }}</td>
                            <td class="p-4 text-gray-700">{{ $m->email }}</td>
                            <td class="p-4">{{ $m->subject ?? '—' }}</td>
                            <td class="p-4 text-gray-600">{{ $m->created_at->format('d/m/Y H:i') }}</td>

                            <td class="p-4 text-right">
                                <a href="{{ route('admin.messages.show', $m) }}"
                                   class="px-3 py-2 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700">
                                    Lire
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="p-6 text-center text-gray-500">Aucun message.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $messages->links() }}
        </div>
    </div>
</x-app-layout>
