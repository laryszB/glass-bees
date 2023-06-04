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

        <form method="POST" action="{{ route('beecolonies_store', ['apiary' => $apiary, 'beehive' => $beehive]) }}">
            @csrf
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
                    value="{{old('name')}}"
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
                >{{old('description')}}</textarea>

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
                    <option value="bardzo słaba" {{ old('strength') === 'bardzo słaba' ? 'selected' : '' }}>Bardzo słaba</option>
                    <option value="słaba" {{ old('strength') === 'słaba' ? 'selected' : '' }}>Słaba</option>
                    <option value="normalna" {{ old('strength') === 'normalna' ? 'selected' : '' }}>Normalna</option>
                    <option value="silna" {{ old('strength') === 'silna' ? 'selected' : '' }}>Silna</option>
                    <option value="bardzo silna" {{ old('strength') === 'bardzo silna' ? 'selected' : '' }}>Bardzo silna</option>
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
                    <option value="bardzo łagodny" {{ old('temperament') === 'bardzo łagodny' ? 'selected' : '' }}>Bardzo łagodny</option>
                    <option value="łagodny" {{ old('temperament') === 'łagodny' ? 'selected' : '' }}>Łagodny</option>
                    <option value="normalny" {{ old('temperament') === 'normalny' ? 'selected' : '' }}>Normalny</option>
                    <option value="agresywny" {{ old('temperament') === 'agresywny' ? 'selected' : '' }}>Agresywny</option>
                    <option value="bardzo agresywny" {{ old('temperament') === 'bardzo agresywny' ? 'selected' : '' }}>Bardzo agresywny</option>
                </select>

                @error('temperament')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>


            <div class="mb-6">
                <button type="submit"
                    class="bg-gray-500 text-white hover:bg-gray-400 rounded py-2 px-4 "
                >
                    Stwórz rodzinę pszczelą
                </button>

                <a href="{{route('beehives_show', ['apiary' => $apiary, 'beehive' => $beehive])}}" class="text-white ml-4"> Powrót </a>
            </div>
        </form>
    </x-card>

</x-layout>
