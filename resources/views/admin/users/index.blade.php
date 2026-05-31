<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-2xl text-blue-800">
            Utilisateurs inscrits
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <div class="bg-white border border-gray-200 rounded-3xl shadow-sm overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-blue-50 text-blue-800">
                    <tr>
                        <th class="p-4 text-left">Nom</th>
                        <th class="p-4 text-left">Email</th>
                        <th class="p-4 text-left">Téléphone</th>
                        <th class="p-4 text-left">Rôle</th>
                        <th class="p-4 text-left">CV</th>
                        <th class="p-4 text-left">Inscrit le</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="p-4 font-semibold">{{ $user->name }}</td>
                            <td class="p-4">{{ $user->email }}</td>
                            <td class="p-4">{{ $user->phone ?? '—' }}</td>
                            <td class="p-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                    @if($user->role === 'admin') bg-red-100 text-red-700
                                    @elseif($user->role === 'trainer') bg-purple-100 text-purple-700
                                    @else bg-blue-100 text-blue-700 @endif">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="p-4">
                                @if($user->cv)
                                    <a
                                        href="{{ asset('storage/'.$user->cv) }}"
                                        target="_blank"
                                        class="text-blue-600 hover:underline font-semibold"
                                    >
                                        Télécharger
                                    </a>
                                @else
                                    —
                                @endif
                            </td>
                            <td class="p-4 text-gray-600">
                                {{ $user->created_at->format('d/m/Y') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-6 text-center text-gray-500">
                                Aucun utilisateur trouvé.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>
