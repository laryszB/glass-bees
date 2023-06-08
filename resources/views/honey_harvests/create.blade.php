<x-layout class="bg-yellow-50">

    @if($apiaries->isEmpty())
        <div class="flex flex-col items-center mt-6">
            <p >Nie posiadasz jeszcze żadnej pasieki, aby móc zarejestrować zbiór miodu.</p>
            <span class="text-fuchsia-600 hover:text-fuchsia-400"><a href="{{route('apiaries_create')}}">Chcesz utworzyć pasiekę?<i class="fa-solid fa-wheat-awn"></i></a></span>
        </div>
    @else
        <x-card
            class="p-10 max-w-lg mx-auto mt-24 bg-yellow-500"
        >
            <header class="text-center">
                <h2 class="text-2xl text-yellow-900 font-bold uppercase mb-1">
                    Zarejestruj zbiór miodu <i class="fa-solid fa-jar"></i>
                </h2>
                <p class="mb-4 text-yellow-900">Tutaj możesz zarejestrować zbiór miodu w danej pasiece</p>
            </header>

            <form method="POST" action="{{route("honeyharvests_store")}}">
                @csrf
                <div class="mb-6">
                    <label
                        for="apiary_id"
                        class="inline-block text-lg mb-2 text-yellow-900"
                    >Wybierz pasiekę</label
                    >
                    <select name="apiary_id" id="apiary_id" class="border border-gray-600 rounded p-2 w-full bg-gray-300">
                        @foreach ($apiaries as $apiary)
                            <option value="{{ $apiary->id }}">{{ $apiary->name }}</option>
                        @endforeach
                    </select>

                    @error('apiary_id')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div x-data="{ isVolume: false }" class="mb-6">

                    <!-- Etykieta z x-text do dynamicznej zmiany tekstu -->
                    <label x-text="isVolume ? 'Objętość (litry)' : 'Waga (kg)'" for="weight-volume" class="inline-block text-lg mb-2 text-yellow-900" id="weight-volume-lable">
                    </label>

                    <!-- Pole input z x-bind do dynamicznej zmiany atrybutów -->
                    <input x-bind:name="isVolume ? 'volume' : 'weight'" type="number" min="0" value="0" class="border border-gray-600 rounded p-2 w-full bg-gray-300" id="weight-volume">

                    @error('weight')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                    <!-- Przycisk/checkbox z x-on:click do zmiany stanu isVolume -->
                    <div class="mt-2">
                        <input type="checkbox" x-on:click="isVolume = !isVolume" id="toggle-input" class="mr-2 hover:cursor-pointer">
                        <label for="toggle-input">Zmień na objętość</label>
                    </div>

                </div>

                <div class="mb-6">
                    <label for="price" class="inline-block text-lg mb-2 text-yellow-900">
                        Cena za kilogram (zł)
                    </label>
                    <input type="number" name="price" min="0" value="0" class="border border-gray-600 rounded p-2 w-full bg-gray-300">

                    @error('price')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">
                    <label for="date" class="inline-block text-lg mb-2 text-yellow-900">
                        Data zbioru
                    </label>
                    <input type="date" name="harvest_date" id="date" class="border border-gray-600 rounded p-2 w-full bg-gray-300">

                    @error('harvest_date')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">
                    <button
                        class="bg-amber-900 text-white rounded py-2 px-4 hover:bg-amber-800"
                    >
                        Zarejestruj zbiór
                    </button>

                    <a href="/" class="text-white ml-4"> Powrót </a>
                </div>
            </form>
        </x-card>

    @endif

</x-layout>
