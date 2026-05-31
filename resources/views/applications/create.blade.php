<x-app-layout>
    <div class="max-w-xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Inscription - {{ $training->title }}</h1>

        @if($errors->any())
            <div class="bg-red-50 border border-red-200 p-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
                </ul>
            </div>
        @endif

        <form method="POST" enctype="multipart/form-data" action="{{ route('applications.store', $training) }}" class="space-y-3">
            @csrf
            <input class="border rounded p-2 w-full" name="full_name" placeholder="Nom complet" value="{{ old('full_name') }}" required>
            <input class="border rounded p-2 w-full" name="email" type="email" placeholder="Email" value="{{ old('email') }}" required>
            <input class="border rounded p-2 w-full" name="phone" placeholder="Téléphone" value="{{ old('phone') }}">

            <div>
                <label class="block text-sm font-medium mb-1">CV (pdf/doc)</label>
                <input type="file" name="cv" class="border rounded p-2 w-full">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Diplôme (pdf/jpg/png)</label>
                <input type="file" name="diploma" class="border rounded p-2 w-full">
            </div>

            <button class="bg-black text-white rounded px-4 py-2 w-full">Envoyer</button>
        </form>
    </div>
</x-app-layout>
