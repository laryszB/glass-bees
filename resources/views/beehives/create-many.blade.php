<x-layout>

    <x-card
        class="p-10 max-w-lg mx-auto mt-24 bg-yellow-800"
    >
        <header class="text-center">
            <h2 class="text-2xl text-white font-bold uppercase mb-1">
                Seryjne tworzenie uli
            </h2>
            <p class="mb-4 text-white">Ule zostaną przypisane do Twojej pasieki</p>
        </header>

        <form method="POST" action="{{ route('beehives_store_many', $apiary) }}">
            @csrf
            <div class="mb-6">
                <label for="beehive_numbers" class="text-lg mb-2 text-white">Numery uli</label>
                <select id="beehive_numbers" name="beehive_numbers[]" multiple class="border rounded px-4 py-2 mb-2">
                    @for ($i = 1; $i <= 100; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                <div class="flex mb-2 ">
                    <input type="number" id="minNumber" placeholder="1" class="border rounded px-4 mr-2" min="1" max="100">
                    <input type="number" id="maxNumber" placeholder="100" class="border rounded px-4 mr-2" min="1" max="100">
                    <button type="button" id="selectRange" class="bg-amber-600 text-white px-4 rounded hover:bg-amber-500">Dodaj</button>
                    <button type="button" id="clearSelection" class="bg-red-700 text-white px-4 rounded ml-2 hover:bg-red-600">Wyczyść</button>
                </div>

                <div id="messageBox" class="message-box hidden">
                    <div class="message-content bg-white p-4 border rounded-lg shadow-md">
                        <p id="messageText"></p>
                        <button type="button" id="closeMessage" class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600">Zamknij</button>
                    </div>
                </div>

                @error('flora')
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
                    value="{{old('type')}}"
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
                    min="0"
                    class="border border-gray-600 rounded p-2 w-full bg-gray-300"
                    name="bodies"
                    placeholder=""
                    value="{{old('bodies')}}"
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
                    value="{{old('bottoms')}}"
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
                    min="0"
                    class="border border-gray-600 rounded p-2 w-full bg-gray-300"
                    name="extensions"
                    value="{{old('extensions')}}"
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
                    min="0"
                    class="border border-gray-600 rounded p-2 w-full bg-gray-300"
                    name="half_extensions"
                    placeholder=""
                    value="{{old('half_extensions')}}"
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
                    min="0"
                    class="border border-gray-600 rounded p-2 w-full bg-gray-300"
                    name="frames"
                    placeholder=""
                    value="{{old('frames')}}"
                />

                @error('frames')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label for="beehive_accessory" class="inline-block text-lg mb-2 text-white">Akcesoria</label>
                <select id="beehive_accessory" name="beehive_accessory[]" multiple>
                    @foreach($beehiveAccessories as $beehiveAccessory)
                        <option value="{{ $beehiveAccessory->id }}">{{ $beehiveAccessory->name }}</option>
                    @endforeach
                </select>

                @error('beehive_accessory')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <button type="submit"
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-white hover:text-black"
                >
                    Utwórz ule
                </button>

                <a href="/" class="text-white ml-4"> Powrót </a>
            </div>
        </form>
    </x-card>

    @vite('resources/js/beehive_numbers.js')

</x-layout>
