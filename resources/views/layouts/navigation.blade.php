<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Left -->
            <div class="flex items-center gap-8">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <div class="w-9 h-9 rounded-xl bg-blue-600 flex items-center justify-center text-white font-bold">
                        IF
                    </div>
                    <span class="font-extrabold text-gray-900 tracking-tight">
                        Institut Formation
                    </span>
                </a>

                <!-- Desktop links -->
                <div class="hidden sm:flex items-center gap-6 text-sm font-medium">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-700">Accueil</a>
                    <a href="{{ route('trainings.index') }}" class="text-gray-700 hover:text-blue-700">Formations</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-blue-700">À propos</a>
                    <a href="{{ route('contact.show') }}" class="text-gray-700 hover:text-blue-700">Contact</a>

                    @auth
              @if(auth()->user()->role === 'admin')
              <div x-data="{ open: false }" class="relative">

            <!-- Bouton Admin -->
            <button
                @click="open = !open"
                @click.outside="open = false"
                class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-gray-200 bg-white text-sm font-semibold text-gray-700 hover:bg-gray-50"
            >
               Espace Admin
                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                          clip-rule="evenodd"/>
                </svg>
            </button>

            <!-- Menu déroulant -->
            <div
                x-show="open"
                x-transition
                class="absolute right-0 mt-2 w-56 rounded-xl bg-white border border-gray-200 shadow-lg z-50"
            >
                <a href="{{ route('admin.users.index') }}"
                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                    👤 Utilisateurs
                </a>

                <a href="{{ route('admin.messages.index') }}"
                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                    ✉️ Messages
                </a>

                <a href="{{ route('admin.applications.index') }}"
                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                    📄 Candidatures
                </a>

                <a href="{{ route('admin.trainings.index') }}"
                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                    📚 Formations (Admin)
                </a>

                <div class="border-t border-gray-100 my-1"></div>

                <a href="{{ route('admin.trainings.create') }}"
                   class="block px-4 py-2 text-sm font-semibold text-blue-600 hover:bg-blue-50">
                    ➕ Ajouter formation
                      </a>
                  </div>
                </div>
              @endif
           @endauth

                </div>
            </div>

            <!-- Right -->
            <div class="hidden sm:flex items-center gap-3">
                @guest
                    <a href="{{ route('login') }}"
                       class="px-4 py-2 rounded-xl text-sm font-semibold text-gray-700 hover:bg-gray-50
                              outline-none focus:outline-none">
                        Connexion
                    </a>

                    @if(Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="px-4 py-2 rounded-xl text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700
                                  outline-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Inscription
                        </a>
                    @endif
                @endguest

                @auth
                    <a href="{{ route('dashboard') }}"
                       class="px-3 py-1 rounded-md text-xs font-semibold text-white bg-blue-600 hover:bg-blue-700
                              outline-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Mon espace
                    </a>

                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 rounded-xl border border-gray-200 bg-white
                                       text-sm font-semibold text-gray-700 hover:bg-gray-50
                                       outline-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                {{ auth()->user()->name }}
                                <svg class="ms-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                Profil
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault(); this.closest('form').submit();">
                                    Déconnexion
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center sm:hidden">
                <button @click="open = !open"
                        class="p-2 rounded-lg hover:bg-gray-100
                               outline-none focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}"
                              class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': !open, 'inline-flex': open}"
                              class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden border-t border-gray-100">
        <div class="px-4 py-3 space-y-2 text-sm font-medium">
            <a href="{{ route('home') }}" class="block py-2 text-gray-700">Accueil</a>
            <a href="{{ route('trainings.index') }}" class="block py-2 text-gray-700">Formations</a>
            <a href="{{ route('about') }}" class="block py-2 text-gray-700">À propos</a>
            <a href="{{ route('contact.show') }}" class="block py-2 text-gray-700">Contact</a>

            @auth
                <a href="{{ route('dashboard') }}" class="block py-2 text-gray-700 font-semibold">
                    Mon espace
                </a>

                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.users.index') }}" class="block py-2 text-gray-700 font-semibold">
                        Utilisateurs
                    </a>

                    <a href="{{ route('admin.messages.index') }}" class="block py-2 text-gray-700 font-semibold">
                        Messages
                    </a>

                    <a href="{{ route('admin.trainings.index') }}" class="block py-2 text-gray-700 font-semibold">
                        Formations (Admin)
                    </a>

                    <a href="{{ route('admin.trainings.create') }}"
                       class="block py-2 px-3 rounded-xl text-white bg-blue-600 font-semibold
                              hover:bg-blue-700
                              outline-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        ➕ Ajouter formation
                    </a>
                @endif
            @endauth

            @guest
                <a href="{{ route('login') }}" class="block py-2 text-blue-700 font-semibold">
                    Connexion
                </a>

                @if(Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="block py-2 px-3 rounded-xl text-white bg-blue-600 font-semibold
                              hover:bg-blue-700
                              outline-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Inscription
                    </a>
                @endif
            @endguest
        </div>
    </div>
</nav>
