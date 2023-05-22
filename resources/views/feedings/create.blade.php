<x-layout class="bg-fuchsia-100">


    <x-card
        class="p-10 max-w-lg mx-auto mt-24 bg-purple-900"
    >
        <header class="text-center">
            <h2 class="text-2xl text-white font-bold uppercase mb-1">
                Zarejestruj karmienie <i class="fa-solid fa-utensils"></i>
            </h2>
            <p class="mb-4 text-white">Tutaj możesz odnotować karmienie, którego dokonałeś w wybranej pasiece i w wybranych ulach</p>
        </header>

        <form method="POST" action="/feedings/store">
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
                        <button id="select-all-beehives" class="text-medium text-white font-semibold bg-violet-500 hover:bg-violet-400 p-1 rounded mr-2" type="button">Zaznacz wszystkie ule</button>
                        <button id="clear-beehives" class="text-medium text-white font-semibold bg-purple-500 hover:bg-purple-400 p-1 rounded" type="button">Wyczyść zaznaczenie</button>
                    </div>
                    @error('beehive_ids')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">
                    <label for="food_id" class="inline-block text-lg mb-2 text-white">
                        Wybierz rodzaj pokarmu
                    </label>
                    <select name="food_id" id="food_id" class="border border-gray-600 rounded p-2 w-full bg-gray-300">
                        @foreach ($foods as $food)
                            <option value="{{ $food->id }}">{{ $food->name }}</option>
                        @endforeach
                    </select>

                    @error('food_id')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">
                    <label for="feeding_date" class="inline-block text-lg mb-2 text-white">
                        Data karmienia
                    </label>
                    <input type="datetime-local" name="feeding_date" id="feeding_date" class="border border-gray-600 rounded p-2 w-full bg-gray-300">

                    @error('feeding_date')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">
                    <div class="mb-6">
                        <label for="amount" class="inline-block text-lg mb-2 text-white">
                            Ilość pokarmu (w kg)
                        </label>
                        <input type="number" step="any" name="amount" id="amount" class="border border-gray-600 rounded p-2 w-full bg-gray-300">
                    </div>

                    @error('amount')
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
                        class="bg-pink-700 text-white rounded py-2 px-4 hover:bg-white hover:text-black"
                    >
                        Zarejestruj karmienie
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
                theme: "classic"
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

</x-layout>
