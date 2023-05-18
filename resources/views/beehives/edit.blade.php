<x-layout>

    <x-card
        class="p-10 max-w-lg mx-auto mt-24 bg-yellow-800"
    >
        <header class="text-center">
            <h2 class="text-2xl text-white font-bold uppercase mb-1">
                Edytuj ul
            </h2>
            <p class="mb-4 text-white">Edytuj swój istniejący ul
                <span class="font-bold">{{$beehive->name}}
                </span>
            należący do pasieki
                <span class="font-bold">{{$apiary->name}}
                </span>
            </p>
        </header>

        <form method="POST" action="{{ route('beehives_update', ['apiary' => $apiary, 'beehive' => $beehive]) }}">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label
                    for="name"
                    class="inline-block text-lg mb-2 text-white"
                >Nazwa ula</label
                >
                <input
                    type="text"
                    class="border border-gray-600 rounded p-2 w-full bg-gray-300"
                    name="name"
                    value="{{$beehive->name}}"
                />

                @error('name')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="description"
                    class="inline-block text-lg mb-2 text-white"
                >
                    Opis ula
                </label>
                <textarea
                    class="border border-gray-600 rounded p-2 w-full bg-gray-300"
                    name="description"
                    rows="10"
                    placeholder="Zamieść tu przydatny dla Ciebie opis ula"
                >{{$beehive->description}}</textarea>

                @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label for="type" class="inline-block text-lg mb-2 text-white"
                >Rodzaj ula</label
                >
                <input
                    type="text"
                    class="border border-gray-600 rounded p-2 w-full bg-gray-300"
                    name="type"
                    placeholder=""
                    value="{{$beehive->type}}"
                />

                @error('type')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label
                    for="bodies"
                    class="inline-block text-lg mb-2 text-white"
                >Liczba korpusów</label
                >
                <input
                    type="number"
                    class="border border-gray-600 rounded p-2 w-full bg-gray-300"
                    name="bodies"
                    placeholder=""
                    value="{{$beehive->bodies}}"
                />

                @error('bodies')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label for="bottoms" class="inline-block text-lg mb-2 text-white"
                >Rodzaj dennicy</label
                >
                <input
                    type="text"
                    class="border border-gray-600 rounded p-2 w-full bg-gray-300"
                    name="bottoms"
                    value="{{$beehive->bottoms}}"
                />

                @error('bottoms')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label
                    for="extensions"
                    class="inline-block text-lg mb-2 text-white"
                >
                    Liczba nadstawek
                </label>
                <input
                    type="number"
                    class="border border-gray-600 rounded p-2 w-full bg-gray-300"
                    name="extensions"
                    value="{{$beehive->extensions}}"
                />

                @error('extensions')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label for="half_extensions" class="inline-block text-lg mb-2 text-white">
                    Liczba półnadstawek
                </label>
                <input
                    type="number"
                    class="border border-gray-600 rounded p-2 w-full bg-gray-300"
                    name="half_extensions"
                    placeholder=""
                    value="{{$beehive->half_extensions}}"
                />

                @error('half_extensions')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label for="frames" class="inline-block text-lg mb-2 text-white">
                    Liczba ramek
                </label>
                <input
                    type="number"
                    class="border border-gray-600 rounded p-2 w-full bg-gray-300"
                    name="frames"
                    placeholder=""
                    value="{{$beehive->frames}}"
                />

                @error('frames')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label
                    for="note"
                    class="inline-block text-lg mb-2 text-white"
                >
                    Notatka
                </label>
                <textarea
                    class="border border-gray-600 rounded p-2 w-full bg-gray-300"
                    name="note"
                    rows="10"
                    placeholder="Zamieść tu przydatny dla Ciebie opis ula"
                >{{$beehive->note}}</textarea>

                @error('note')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>


            <div class="mb-6">
                <button
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-white hover:text-black"
                >
                    Zatwierdź edycję
                </button>

                <a href="{{route('beehives_index', [$apiary])}}" class="text-white ml-4"> Powrót </a>
            </div>
        </form>
    </x-card>

</x-layout>
