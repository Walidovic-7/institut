<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Contact</h1>

        @if(session('success'))
            <div class="bg-green-50 border border-green-200 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-50 border border-red-200 p-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid md:grid-cols-2 gap-6">
            <form method="POST" action="{{ route('contact.send') }}" class="space-y-3">
                @csrf
                <input class="border rounded p-2 w-full" name="name" placeholder="Votre nom" value="{{ old('name') }}" required>
                <input class="border rounded p-2 w-full" name="email" type="email" placeholder="Votre email" value="{{ old('email') }}" required>
                <textarea class="border rounded p-2 w-full" name="message" rows="6" placeholder="Votre message..." required>{{ old('message') }}</textarea>
                <button class="bg-black text-white rounded px-4 py-2 w-full">Envoyer</button>
            </form>

            <div class="space-y-3">
                <div class="border rounded p-4">
                    <div class="font-semibold">Email</div>
                    <div>contact@institut.com</div>
                </div>
                <div class="border rounded p-4">
                    <div class="font-semibold">Téléphone</div>
                    <div>+213 XX XX XX XX</div>
                </div>

                <div class="border rounded overflow-hidden">
                    <iframe
                        class="w-full h-64"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        src="https://www.google.com/maps?q=Algiers&output=embed">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
