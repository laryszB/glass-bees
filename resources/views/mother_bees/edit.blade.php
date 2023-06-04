<x-layout class="bg-gray-300">

    <x-card
        class="p-10 max-w-lg mx-auto mt-24 bg-gray-900"
    >
        <header class="text-center">
            <h2 class="text-2xl text-amber-400 font-bold uppercase mb-1">
                Dodaj matkę pszczelą do ula <span class="text-amber-700">{{$beehive->name}}</span> w pasiece <span class="text-yellow-200">{{$apiary->name}}</span>
            </h2>
            <p class="mb-4 text-white">Matka pszczela zostanie przypisana do tego ula</p>
        </header>

        <form method="POST" action="{{ route('motherbees_update', ['apiary' => $apiary, 'beehive' => $beehive, 'motherBee' => $motherBee]) }}">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label
                    for="race"
                    class="inline-block text-lg mb-2 text-white"
                >Rasa</label
                >
                <input
                    type="text"
                    class="border border-gray-600 rounded p-2 w-full bg-gray-300"
                    name="race"
                    value="{{$motherBee->race}}"
                />

                @error('race')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="line"
                    class="inline-block text-lg mb-2 text-white"
                >Linia</label
                >
                <input
                    type="text"
                    class="border border-gray-600 rounded p-2 w-full bg-gray-300"
                    name="line"
                    value="{{$motherBee->line}}"
                />

                @error('line')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="placement_date"
                    class="inline-block text-lg mb-2 text-white"
                >
                    Data umieszczenia
                </label>
                <input value="{{$motherBee->placement_date}}" type="date" name="placement_date" class="border border-gray-600 rounded p-2 w-full bg-gray-300">

                @error('placement_date')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="birth_date"
                    class="inline-block text-lg mb-2 text-white"
                >
                    Data narodzin matki
                </label>
                <input value="{{$motherBee->birth_date}}" type="date" name="birth_date" class="border border-gray-600 rounded p-2 w-full bg-gray-300">

                @error('birth_date')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="state"
                    class="inline-block text-lg mb-2 text-white"
                >
                    Stan matki
                </label>
                <select name="state" class="border border-gray-600 rounded p-2 w-full bg-gray-300">
                    <option value="unasieniona" {{ $motherBee->state === 'unasieniona' ? 'selected' : '' }}>Unasieniona</option>
                    <option value="nieunasieniona" {{ $motherBee->state === 'nieunasieniona' ? 'selected' : '' }}>Nieunasieniona</option>
                    <option value="trutniowa" {{ $motherBee->state === 'trutniowa' ? 'selected' : '' }}>Trutniowa</option>
                </select>

                @error('state')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="note" class="inline-block text-lg mb-2 text-white">
                    Notatka
                </label>
                <textarea name="note" id="note" rows="5" class="border border-gray-600 rounded p-2 w-full bg-gray-300">{{$motherBee->note}}</textarea>

                @error('note')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>


            <div class="mb-6">
                <button type="submit"
                        class="bg-amber-500 text-black font-semibold hover:bg-amber-400 rounded py-2 px-4 "
                >
                    Edytuj matkę pszczelą
                </button>

                <a href="{{route('beehives_show', ['apiary' => $apiary, 'beehive' => $beehive])}}" class="text-white ml-4"> Powrót </a>
            </div>
        </form>
    </x-card>

</x-layout>
