<x-layout class="bg-gray-300">

    <x-card
        class="p-10 max-w-lg mx-auto mt-24 bg-gray-800"
    >
        <header class="text-center">
            <h2 class="text-2xl text-amber-400 font-bold uppercase mb-1">
                Stwórz rodzinę pszczelą dla ula <span class="text-amber-700">{{$beehive->name}}</span> w pasiece <span class="text-yellow-200">{{$apiary->name}}</span>
            </h2>
            <p class="mb-4 text-white">Rodzina pszczela zostanie przypisane do tego ula</p>
        </header>

        <form method="POST" action="{{ route('beecolonies_update', ['apiary' => $apiary, 'beehive' => $beehive, 'beeColony' => $beeColony]) }}">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label
                    for="name"
                    class="inline-block text-lg mb-2 text-white"
                >Nazwa rodziny pszczelej</label
                >
                <input
                    type="text"
                    class="border border-gray-600 rounded p-2 w-full bg-gray-300"
                    name="name"
                    value="{{$beeColony->name}}"
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
                    Opis rodziny pszczelej
                </label>
                <textarea
                    class="border border-gray-600 rounded p-2 w-full bg-gray-300"
                    name="description"
                    rows="10"
                    placeholder="Zamieść tu przydatny dla Ciebie opis ula"
                >{{$beeColony->description}}</textarea>

                @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label
                    for="strength"
                    class="inline-block text-lg mb-2 text-white"
                >
                    Siła rodziny pszczelej
                </label>
                <select name="strength" class="border border-gray-600 rounded p-2 w-full bg-gray-300">
                    <option value="bardzo słaba" {{ $beeColony->strength === 'bardzo słaba' ? 'selected' : '' }}>Bardzo słaba</option>
                    <option value="słaba" {{ $beeColony->strength === 'słaba' ? 'selected' : '' }}>Słaba</option>
                    <option value="normalna" {{ $beeColony->strength === 'normalna' ? 'selected' : '' }}>Normalna</option>
                    <option value="silna" {{ $beeColony->strength === 'silna' ? 'selected' : '' }}>Silna</option>
                    <option value="bardzo silna" {{ $beeColony->strength === 'bardzo silna' ? 'selected' : '' }}>Bardzo silna</option>
                </select>

                @error('strength')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="temperament"
                    class="inline-block text-lg mb-2 text-white"
                >
                    Temperament rodziny pszczelej
                </label>
                <select name="temperament" class="border border-gray-600 rounded p-2 w-full bg-gray-300">
                    <option value="bardzo łagodny" {{ $beeColony->temperament === 'bardzo łagodny' ? 'selected' : '' }}>Bardzo łagodny</option>
                    <option value="łagodny" {{ $beeColony->temperament === 'łagodny' ? 'selected' : '' }}>Łagodny</option>
                    <option value="normalny" {{ $beeColony->temperament === 'normalny' ? 'selected' : '' }}>Normalny</option>
                    <option value="agresywny" {{ $beeColony->temperament === 'agresywny' ? 'selected' : '' }}>Agresywny</option>
                    <option value="bardzo agresywny" {{ $beeColony->temperament === 'bardzo agresywny' ? 'selected' : '' }}>Bardzo agresywny</option>
                </select>

                @error('temperament')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>


            <div class="mb-6">
                <button type="submit"
                        class="bg-gray-500 text-white hover:bg-gray-400 rounded py-2 px-4 "
                >
                    Zatwierdź edycję
                </button>

                <a href="/" class="text-white ml-4"> Powrót </a>
            </div>
        </form>
    </x-card>

</x-layout>
