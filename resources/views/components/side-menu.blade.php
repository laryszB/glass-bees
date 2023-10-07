<div class="lg:hidden flex justify-end mb-4 mt-2" x-data="{ open: false }">
    <button @click="open = !open" class="p-2">
        <i class="fa-solid fa-bars fa-2xl"></i>
    </button>
    <div x-show="open"
         x-transition:enter="transition ease-out duration-300 transform"
         x-transition:enter-start="translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition ease-in duration-300 transform"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="translate-x-full"
         class="absolute right-0 top-0 w-64 h-screen p-4 z-50 bg-laravel text-white"
         @click.away="open = false"
    >
        <button @click="open = !open" class="p-2"><i class="fa-solid fa-xmark fa-xl"></i></button>
        @auth
            <!-- Zawartość dla zalogowanych użytkowników -->
            <div>
                <p class="font-bold text-lg uppercase mb-4 mt-4 text-center">Witaj, {{auth()->user()->username}}</p>
                <ul class="flex flex-col space-y-3 text-lg font-semibold">
                    <li>
                        <a
                            class="bg-amber-400 py-1 px-3 rounded hover:bg-amber-300"
                            href="{{route('apiaries_create')}}"
                        >
                            <i class="fa-solid fa-wheat-awn"></i> Utwórz pasiekę
                        </a>
                    </li>
                    <li>
                        <a
                            class="bg-amber-400 py-1 px-3 rounded hover:bg-amber-300"
                            href="{{route('apiaries_manage')}}"
                        >
                            <i class="fa-solid fa-gear"></i> Zarządzaj pasiekami
                        </a>
                    </li>
                    <li>
                        <a
                            class="bg-amber-400 py-1 px-3 rounded hover:bg-amber-300"
                            href="{{route('beehives_manage')}}"
                        >
                            <i class="fa-brands fa-hive"></i> Zarządzaj ulami
                        </a>
                    </li>
                    <li class="pt-2">
                        <a
                            class="bg-purple-900 py-1 px-3 rounded hover:bg-purple-800"
                            href="{{route('feedings_create')}}"
                        >
                            <i class="fa-solid fa-utensils"></i> Karmienie pszczół
                        </a>
                    </li>
                    <li>
                        <a
                            class="bg-purple-900 py-1 px-3 rounded hover:bg-purple-800"
                            href="{{route('feedings_index')}}"
                        >
                            <i class="fa-solid fa-utensils"></i> Rejestr karmień
                        </a>
                    </li>
                    <li class="pt-2">
                        <a
                            class="bg-teal-900 py-1 px-3 rounded hover:bg-teal-800"
                            href="{{route('diseasescases_create')}}"
                        >
                            <i class="fa-solid fa-syringe"></i> Choroby pszczół
                        </a>
                    </li>
                    <li>
                        <a
                            class="bg-teal-900 py-1 px-3 rounded hover:bg-teal-800"
                            href="{{route('diseasescases_index')}}"
                        >
                            <i class="fa-solid fa-syringe"></i> Rejestr chorób
                        </a>
                    </li>
                    <li class="pt-2">
                        <a
                            class="bg-yellow-800 py-1 px-3 rounded hover:bg-yellow-400"
                            href="{{route('honeyharvests_create')}}"
                        >
                            <i class="fa-solid fa-jar"></i> Zbiór miodu
                        </a>
                    </li>
                    <li class="pt-2">
                        <a
                            class="bg-yellow-800 py-1 px-3 rounded hover:bg-yellow-400"
                            href="{{route('honeyharvests_index')}}"
                        >
                            <i class="fa-solid fa-jar"></i> Rejestr zbiorów miodu
                        </a>
                    </li>
                    <li class="pt-2">
                        <form class="inline" method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="text-gray-200 hover:text-white">
                                <i class="fa-solid fa-door-closed"></i>
                                Wyloguj się
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <!-- Zawartość dla niezalogowanych użytkowników -->
            <a href="/register" class="text-gray-200 hover:text-white block mt-4"><i class="fa-solid fa-user-plus"></i> Zarejestruj się</a>
            <a href="/login" class="text-gray-200 hover:text-white block mt-4"><i class="fa-solid fa-arrow-right-to-bracket"></i> Zaloguj się</a>
        @endauth
    </div>
</div>
