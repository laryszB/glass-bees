<x-layout>

    <x-card
        class="p-10 max-w-lg mx-auto mt-24"
    >
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edytuj pasiekę
            </h2>
            <p class="mb-4">Edytuj swoją istniejącą pasiekę: <b>{{$apiary->name}}</b></p>
        </header>

        <form method="POST" action="/apiaries/{{$apiary->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{--    dyrektywa laravel - ma na celu ustawienie metody przesyłu danych formularza na PUT do edycji (w htmlu nie da się tego zrobić)        --}}
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
                    value="{{$apiary->name}}"
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
                >{{$apiary->description}}</textarea>

                @error('description')
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
                    value="{{$apiary->street_number}}"
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
                    value="{{$apiary->street_name}}"
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
                    value="{{$apiary->city}}"
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
                    value="{{$apiary->country}}"
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
                    value="{{$apiary->zip_code}}"
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

                <img
                    class="w-48 mr-6 mb-6"
                    src="{{$apiary->photo ? asset('storage/' . $apiary->photo) : asset('images/apiary_logo.png')}}"
                    alt=""
                />

                @error('photo')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <button
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                >
                    Edytuj pasiekę
                </button>

                <a href="/" class="text-black ml-4"> Powrót </a>
            </div>
        </form>
    </x-card>

</x-layout>
