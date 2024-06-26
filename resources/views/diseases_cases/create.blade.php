<x-layout class="bg-sky-100">

    @if($apiaries->isEmpty())
        <div class="flex flex-col items-center mt-6">
            <p >Nie posiadasz jeszcze żadnej pasieki, aby móc odnotowywać choroby.</p>
            <span class="text-fuchsia-600 hover:text-fuchsia-400"><a href="{{route('apiaries_create')}}">Chcesz utworzyć pasiekę?<i class="fa-solid fa-wheat-awn"></i></a></span>
        </div>
    @else
        <x-card
            class="p-10 max-w-lg mx-auto mt-24 bg-teal-900"
        >
            <header class="text-center">
                <h2 class="text-2xl text-white font-bold uppercase mb-1">
                    Odnotuj chorobę <i class="fa-solid fa-syringe"></i>
                </h2>
                <p class="mb-1 text-white">Tutaj możesz odnotować chorobę, która dotyka Twoją rodzinę pszczelą w danym ulu</p>
                <p class="mb-4 text-gray-300"><a href="{{route('diseasescases_index')}}">Chcesz przejść do rejestru? <i class="fa-solid fa-arrow-right"></i></a></p>
            </header>

            <form method="POST" action="{{route('diseasescases_store')}}">
                @csrf
                <div class="mb-6">
                    <label
                        for="apiary_id"
                        class="inline-block text-lg mb-2 text-white"
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

                <div class="mb-6">
                    <label for="beehive_ids" class="inline-block text-lg mb-2 text-white">
                        Wybierz ule
                    </label>
                    <select name="beehive_ids[]" id="beehive_ids" multiple class="border border-gray-600 rounded p-2 w-full bg-gray-300">

                    </select>
                    <div class="flex justify-end mt-2">
                        <button id="select-all-beehives" class="text-medium text-white font-semibold bg-emerald-500 hover:bg-emerald-400 p-1 rounded mr-2" type="button">Zaznacz wszystkie ule</button>
                        <button id="clear-beehives" class="text-medium text-white font-semibold bg-green-500 hover:bg-green-400 p-1 rounded" type="button">Wyczyść zaznaczenie</button>
                    </div>
                    @error('beehive_ids')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">
                    <label for="beeDisease_id" class="inline-block text-lg mb-2 text-white">
                        Wybierz chorobę
                    </label>
                    <select name="beeDisease_id" id="beeDisease_id" class="border border-gray-600 rounded p-2 w-full bg-gray-300">
                        @foreach ($beeDiseases as $beeDisease)
                            <option value="{{ $beeDisease->id }}">{{ $beeDisease->name }}</option>
                        @endforeach
                    </select>

                    @error('beeDisease_id')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">
                    <label for="date" class="inline-block text-lg mb-2 text-white">
                        Data wystąpienia
                    </label>
                    <input type="datetime-local" name="date" id="date" class="border border-gray-600 rounded p-2 w-full bg-gray-300">

                    @error('date')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">
                    <label for="note" class="inline-block text-lg mb-2 text-white">
                        Notatka
                    </label>
                    <textarea name="note" id="note" rows="5" class="border border-gray-600 rounded p-2 w-full bg-gray-300"></textarea>

                    @error('note')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">
                    <button
                        class="bg-rose-900 text-white rounded py-2 px-4 hover:bg-white hover:text-black"
                    >
                        Odnotuj chorobę
                    </button>

                    <a href="/" class="text-white ml-4"> Powrót </a>
                </div>
            </form>
        </x-card>

        <script defer>
            $(document).ready(function () {
                $('#beehive_ids').select2({
                    placeholder: 'Rozwiń listę uli...',
                    closeOnSelect: false,
                    theme: "classic",
                    "language": {
                        "noResults": function(){
                            return "Nie znaleziono podanego ula";
                        }
                    }
                });

                $('#clear-beehives').click(function (){
                    $('#beehive_ids').val(null).trigger('change');
                });

                $("#select-all-beehives").click(function () {
                    var allBeehiveIds = $('#beehive_ids option').map(function () {
                        return $(this).val();
                    }).get();

                    $('#beehive_ids').val(allBeehiveIds).trigger('change');
                });

                var beehives = @json($beehives);  // Pobierz ule przekazane z serwera

                function updateBeehives(apiary_id) {
                    $('#beehive_ids').empty(); // Usuń wszystkie obecne opcje

                    // Pętla przez wszystkie ule
                    for (let i = 0; i < beehives.length; i++) {
                        // Jeśli ul należy do wybranej pasieki, dodaj go do listy rozwijanej
                        if (beehives[i].apiary_id == apiary_id) {
                            $('#beehive_ids').append($('<option></option>').val(beehives[i].id).text(beehives[i].name));
                        }
                    }
                }

                // Wywołaj funkcję aktualizującą ule przy zmianie elementu "apiary_id"
                $('#apiary_id').change(function () {
                    var apiary_id = $(this).val();
                    updateBeehives(apiary_id);
                });

                // Wywołaj funkcję aktualizującą ule przy załadowaniu strony
                var initialApiaryId = $('#apiary_id').val();
                updateBeehives(initialApiaryId);
            });
        </script>

    @endif

</x-layout>
