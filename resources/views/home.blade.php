<x-app-layout>
    <div class="bg-gradient-to-b from-blue-50 to-white">
        <!-- Hero -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-10">
            <div class="grid lg:grid-cols-2 gap-10 items-center">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white border border-blue-100 text-blue-700 text-sm font-semibold">
                        <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                        Apprenez avec des formateurs qualifiés
                    </div>

                    <h1 class="mt-4 text-4xl sm:text-5xl font-extrabold tracking-tight text-gray-900">
                        Institut de formation<br class="hidden sm:block">
                        <span class="text-blue-700">moderne</span> & certifiant
                    </h1>

                    <p class="mt-4 text-lg text-gray-600 leading-relaxed">
                        Des formations pratiques (PDF, vidéos), un suivi de progression,
                        et des certifications. Construisez vos compétences dès aujourd’hui.
                    </p>

                    <div class="mt-7 flex flex-wrap gap-3">
                        <a href="{{ route('trainings.index') }}"
                           class="px-5 py-3 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700">
                            Explorer les formations
                        </a>
                        <a href="{{ route('contact.show') }}"
                           class="px-5 py-3 rounded-xl border border-gray-200 bg-white text-gray-900 font-semibold hover:bg-gray-50">
                            Nous contacter
                        </a>
                    </div>

                    <div class="mt-8 grid grid-cols-3 gap-4 text-sm">
                        <div class="p-4 rounded-xl bg-white border border-gray-200">
                            <div class="font-extrabold text-gray-900">+20</div>
                            <div class="text-gray-600">Formations</div>
                        </div>
                        <div class="p-4 rounded-xl bg-white border border-gray-200">
                            <div class="font-extrabold text-gray-900">Suivi</div>
                            <div class="text-gray-600">Progression</div>
                        </div>
                        <div class="p-4 rounded-xl bg-white border border-gray-200">
                            <div class="font-extrabold text-gray-900">Certificat</div>
                            <div class="text-gray-600">Fin de parcours</div>
                        </div>
                    </div>
                </div>

                <!-- Slider -->
                <div
                    x-data="slider()"
                    x-init="start()"
                    @mouseenter="stop()"
                    @mouseleave="start()"
                    class="relative"
                >
                    <div class="rounded-3xl overflow-hidden border border-gray-200 shadow-sm bg-white">
                        <div class="relative h-72 sm:h-96">
                            <template x-for="(img, i) in images" :key="i">
                                <img
                                    x-show="index === i"
                                    x-transition.opacity.duration.500ms
                                    :src="img"
                                    class="absolute inset-0 w-full h-full object-cover"
                                    alt="Slide"
                                />
                            </template>

                            <div class="absolute inset-0 bg-gradient-to-t from-black/35 to-transparent"></div>

                            <div class="absolute bottom-4 left-4 right-4 text-white">
                                <div class="text-lg font-bold">Des salles modernes & du contenu premium</div>
                                <div class="text-sm text-white/90 mt-1">Apprenez et progressez étape par étape.</div>
                            </div>
                        </div>

                        <div class="p-4 flex items-center justify-between">
                            <div class="flex gap-2">
                                <template x-for="(dot, i) in images" :key="i">
                                    <button
                                        type="button"
                                        @click="go(i)"
                                        class="h-2.5 w-2.5 rounded-full"
                                        :class="index === i ? 'bg-blue-600' : 'bg-gray-300'">
                                    </button>
                                </template>
                            </div>

                            <div class="flex gap-2">
                                <button type="button" @click="prev()" class="px-3 py-2 rounded-xl border border-gray-200 hover:bg-gray-50">‹</button>
                                <button type="button" @click="next()" class="px-3 py-2 rounded-xl bg-blue-600 text-white hover:bg-blue-700">›</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Featured trainings -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
            <div class="flex items-end justify-between gap-6">
                <div>
                    <h2 class="text-2xl font-extrabold text-gray-900">Formations phares</h2>
                    <p class="mt-2 text-gray-600">Choisissez une formation et démarrez dès maintenant.</p>
                </div>
                <a href="{{ route('trainings.index') }}" class="text-sm font-semibold text-blue-700 hover:text-blue-800">
                    Voir tout →
                </a>
            </div>

            <div class="mt-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @forelse($featuredTrainings ?? [] as $t)
                    <a href="{{ route('trainings.show', $t->slug) }}"
                       class="group rounded-2xl border border-gray-200 bg-white p-5 hover:shadow-sm transition">

                        <!-- ✅ IMAGE EN HAUT -->
                        <img
                            src="{{ $t->image ? asset('storage/'.$t->image) : asset('images/default-training.jpg') }}"
                            alt="{{ $t->title }}"
                            class="w-full h-40 object-cover rounded-2xl border mb-4"
                            loading="lazy"
                        >

                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <div class="text-xs inline-flex gap-2 flex-wrap">
                                    <span class="px-2 py-1 rounded-full bg-blue-50 text-blue-700 font-semibold">{{ $t->domain }}</span>
                                    <span class="px-2 py-1 rounded-full bg-gray-100 text-gray-700 font-semibold">{{ $t->level }}</span>
                                </div>

                                <div class="mt-3 text-lg font-extrabold text-gray-900 group-hover:underline">
                                    {{ $t->title }}
                                </div>
                            </div>

                            <div class="text-right">
                                <div class="text-sm font-extrabold text-gray-900">
                                    {{ number_format($t->price, 0, '.', ' ') }} DA
                                </div>
                                <div class="text-xs text-gray-500 mt-1">{{ $t->duration_hours }}h</div>
                            </div>
                        </div>

                        <p class="mt-3 text-sm text-gray-600 line-clamp-3">
                            {{ $t->description }}
                        </p>

                        <div class="mt-4 text-sm font-semibold text-blue-700">
                            Voir détails →
                        </div>
                    </a>
                @empty
                    <div class="text-gray-600">
                        Aucune formation phare. Mets <code>is_featured = 1</code> sur une formation.
                    </div>
                @endforelse
            </div>
        </section>
    </div>

    <script>
        function slider() {
            return {
                images: [
                    "{{ asset('images/slide1.jpg') }}",
                    "{{ asset('images/slide2.jpg') }}",
                    "{{ asset('images/slide3.jpg') }}"
                ],
                index: 0,
                timer: null,

                start() {
                    this.stop();
                    this.timer = setInterval(() => this.next(), 3500);
                },
                stop() {
                    if (this.timer) clearInterval(this.timer);
                    this.timer = null;
                },
                go(i) {
                    this.index = i;
                },
                next() {
                    this.index = (this.index + 1) % this.images.length;
                },
                prev() {
                    this.index = (this.index - 1 + this.images.length) % this.images.length;
                }
            }
        }
    </script>
</x-app-layout>
