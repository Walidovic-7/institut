<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-extrabold text-blue-800">Lire message</h2>

            <a href="{{ route('admin.messages.index') }}"
               class="px-4 py-2 rounded-xl border border-gray-200 font-semibold hover:bg-gray-50">
                ← Retour
            </a>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <div class="bg-white border border-gray-200 rounded-3xl p-6 space-y-4">
            <div class="grid sm:grid-cols-2 gap-4">
                <div>
                    <div class="text-xs text-gray-500">Nom</div>
                    <div class="font-bold text-gray-900">{{ $message->name }}</div>
                </div>
                <div>
                    <div class="text-xs text-gray-500">Email</div>
                    <div class="font-bold text-gray-900">{{ $message->email }}</div>
                </div>
            </div>

            <div>
                <div class="text-xs text-gray-500">Sujet</div>
                <div class="font-semibold text-gray-900">{{ $message->subject ?? '—' }}</div>
            </div>

            <div>
                <div class="text-xs text-gray-500">Message</div>
                <div class="mt-2 whitespace-pre-line text-gray-800">{{ $message->message }}</div>
            </div>

            <div class="flex items-center justify-between pt-4 border-t">
                <div class="text-sm text-gray-500">
                    Envoyé le {{ $message->created_at->format('d/m/Y H:i') }}
                </div>

                <form method="POST" action="{{ route('admin.messages.destroy', $message) }}"
                      onsubmit="return confirm('Supprimer ce message ?');">
                    @csrf
                    @method('DELETE')
                    <button class="px-4 py-2 rounded-xl bg-red-600 text-white font-semibold hover:bg-red-700">
                        Supprimer
                    </button>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>
