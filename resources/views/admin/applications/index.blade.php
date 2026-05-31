<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-2xl text-blue-800">
            Gestion des candidatures
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        @if(session('success'))
            <div class="mb-4 p-4 rounded-xl bg-green-50 text-green-700 border border-green-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white border border-gray-200 rounded-2xl shadow-sm">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr class="text-left text-sm font-semibold text-gray-600">
                        <th class="px-4 py-3">Candidat</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Formation</th>
                        <th class="px-4 py-3">Statut</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    @forelse($applications as $app)
                        <tr class="text-sm text-gray-700">
                            <td class="px-4 py-3 font-semibold">
                                {{ $app->user->name }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $app->user->email }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $app->training->title }}
                            </td>
                            <td class="px-4 py-3">
                                @if($app->status === 'pending')
                                    <span class="px-2 py-1 rounded-full text-xs bg-yellow-100 text-yellow-700">
                                        En attente
                                    </span>
                                @elseif($app->status === 'accepted')
                                    <span class="px-2 py-1 rounded-full text-xs bg-green-100 text-green-700">
                                        Acceptée
                                    </span>
                                @else
                                    <span class="px-2 py-1 rounded-full text-xs bg-red-100 text-red-700">
                                        Refusée
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3 space-x-2">
                                @if($app->status === 'pending')
                                    <form method="POST"
                                          action="{{ route('admin.applications.status', $app) }}"
                                          class="inline">
                                        @csrf
                                        <input type="hidden" name="status" value="accepted">
                                        <button class="px-3 py-1 rounded-lg bg-green-600 text-white hover:bg-green-700">
                                            Accepter
                                        </button>
                                    </form>

                                    <form method="POST"
                                          action="{{ route('admin.applications.status', $app) }}"
                                          class="inline">
                                        @csrf
                                        <input type="hidden" name="status" value="rejected">
                                        <button class="px-3 py-1 rounded-lg bg-red-600 text-white hover:bg-red-700">
                                            Refuser
                                        </button>
                                    </form>
                                @else
                                    <span class="text-gray-400 text-sm">
                                        Action terminée
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                                Aucune candidature trouvée.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
