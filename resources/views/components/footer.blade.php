<footer class="bg-gray-900 text-gray-200 mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid md:grid-cols-4 gap-8">
            <div>
                <div class="flex items-center gap-2">
                    <div class="w-9 h-9 rounded-xl bg-blue-600 flex items-center justify-center text-white font-bold">IF</div>
                    <span class="font-extrabold text-white">Institut Formation</span>
                </div>
                <p class="mt-3 text-sm text-gray-300 leading-relaxed">
                    Formations pratiques, suivi de progression, supports de cours et certifications.
                </p>
            </div>

            <div>
                <div class="font-semibold text-white">Navigation</div>
                <div class="mt-3 space-y-2 text-sm">
                    <a class="block hover:text-white" href="{{ route('home') }}">Accueil</a>
                    <a class="block hover:text-white" href="{{ route('trainings.index') }}">Formations</a>
                    <a class="block hover:text-white" href="{{ route('about') }}">À propos</a>
                    <a class="block hover:text-white" href="{{ route('contact.show') }}">Contact</a>
                </div>
            </div>

            <div>
                <div class="font-semibold text-white">Contact</div>
                <div class="mt-3 space-y-2 text-sm text-gray-300">
                    <div>Email : contact@institut.com</div>
                    <div>Tél : +213 XX XX XX XX</div>
                    <div>Adresse : Alger, Algérie</div>
                </div>
            </div>

            <div>
                <div class="font-semibold text-white">Newsletter</div>
                <p class="mt-3 text-sm text-gray-300">Recevez nos nouvelles formations.</p>
                <form class="mt-3 flex gap-2">
                    <input class="w-full rounded-xl px-3 py-2 text-gray-900" placeholder="Votre email">
                    <button type="button" class="rounded-xl px-4 py-2 bg-blue-600 hover:bg-blue-700 font-semibold text-white">
                        OK
                    </button>
                </form>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-10 pt-6 text-sm text-gray-400 flex flex-col sm:flex-row gap-2 sm:items-center sm:justify-between">
            <div>© {{ date('Y') }} Institut Formation. Tous droits réservés.</div>
            <div class="flex gap-4">
                <a class="hover:text-white" href="#">Mentions légales</a>
                <a class="hover:text-white" href="#">Politique de confidentialité</a>
            </div>
        </div>
    </div>
</footer>
