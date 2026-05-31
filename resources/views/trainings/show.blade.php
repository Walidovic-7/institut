<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">
        @if(session('success'))
            <div class="bg-green-50 border border-green-200 p-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        <h1 class="text-3xl font-bold">{{ $training->title }}</h1>
        <p class="text-gray-600">{{ $training->domain }} • {{ $training->level }} • {{ $training->duration_hours }}h</p>

        <div class="mt-4 flex gap-3">
            <a class="bg-black text-white px-4 py-2 rounded" href="{{ route('applications.create', $training) }}">
                S’inscrire
            </a>
            <a class="border px-4 py-2 rounded" href="{{ route('contact.show') }}">Nous contacter</a>
        </div>

        <div class="mt-8 space-y-6">
            <div>
                <h2 class="font-semibold text-xl">Description</h2>
                <p class="mt-2 text-gray-700 whitespace-pre-line">{{ $training->description }}</p>
            </div>

            <div>
                <h2 class="font-semibold text-xl">Programme</h2>
                <p class="mt-2 text-gray-700 whitespace-pre-line">{{ $training->program }}</p>
            </div>

            <div class="grid md:grid-cols-2 gap-4">
                <div class="border rounded p-4">
                    <div class="font-semibold">Prix</div>
                    <div>{{ number_format($training->price,2) }} DA</div>
                </div>
                <div class="border rounded p-4">
                    <div class="font-semibold">Certification</div>
                    <div>{{ $training->certification ?? '—' }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
