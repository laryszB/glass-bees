<x-layout>

    <x-card
        class="p-10 max-w-lg mx-auto mt-24"
    >
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Utwórz pasiekę
            </h2>
            <p class="mb-4">Pasieka zostanie przypisana do Twojego konta</p>
        </header>

        <form method="POST" action="/apiaries" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label
                    for="name"
                    class="inline-block text-lg mb-2"
                >Nazwa pasieki</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
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
                    class="inline-block text-lg mb-2"
                >
                    Opis pasieki
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="description"
                    rows="10"
                    placeholder="Zamieść tu przydatny dla Ciebie opis pasieki"
                >{{old('description')}}</textarea>

                @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label for="flora" class="inline-block text-lg mb-2">Roślinność</label>
                <select id="flora" name="flora[]" multiple>
                    @foreach($floras as $flora)
                        <option value="{{ $flora->id }}">{{ $flora->name }}</option>
                    @endforeach
                </select>

                @error('flora')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label for="street_number" class="inline-block text-lg mb-2"
                >Numer ulicy</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="street_number"
                    placeholder=""
                    value="{{old('street_number')}}"
                />

                @error('street_number')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label
                    for="street_name"
                    class="inline-block text-lg mb-2"
                >Nazwa ulicy</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="street_name"
                    placeholder=""
                    value="{{old('street_name')}}"
                />

                @error('street_name')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label for="city" class="inline-block text-lg mb-2"
                >Miasto</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="city"
                    value="{{old('city')}}"
                />

                @error('city')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label
                    for="country"
                    class="inline-block text-lg mb-2"
                >
                    Kraj
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="country"
                    value="{{old('country')}}"
                />

                @error('country')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label for="zip_code" class="inline-block text-lg mb-2">
                    Kod pocztowy
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="zip_code"
                    placeholder=""
                    value="{{old('zip_code')}}"
                />

                @error('zip_code')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label for="photo" class="inline-block text-lg mb-2">
                    Zdjęcie pasieki
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="photo"
                />

                @error('photo')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <button
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                >
                    Utwórz pasiekę
                </button>

                <a href="/" class="text-black ml-4"> Powrót </a>
            </div>
        </form>
    </x-card>

{{--    Skrypt odpowiedzialny za działanie biblioteki slim select przy wyborze roślinności--}}
{{--    <script>--}}
{{--        new SlimSelect({--}}
{{--            select: '#flora',--}}
{{--            settings: {--}}
{{--                placeholderText: 'Wybierz rośliny',--}}
{{--                closeOnSelect: false,--}}
{{--                searchPlaceholder: 'Szukaj roślin...',--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}

</x-layout>
