<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Stagiaire
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Bienvenue {{ auth()->user()->name }} 👋
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Mes formations</h3>

                    @if($enrollments->isEmpty())
                        <p class="text-gray-600">Aucune formation inscrite pour le moment.</p>
                    @else
                        <div class="space-y-3">
                            @foreach($enrollments as $enrollment)
                                <div class="border rounded-lg p-4">
                                    <div class="font-semibold">{{ $enrollment->training->title }}</div>
                                    <div class="text-sm text-gray-600">
                                        Progression : {{ $enrollment->progress_percent }}%
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
