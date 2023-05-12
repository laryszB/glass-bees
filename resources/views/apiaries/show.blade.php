<x-layout>

    <a href="/" class="inline-block text-black ml-4 mb-4"
    ><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card>
            <div
                class="flex flex-col items-center justify-center text-center"
            >
                <img
                    class="w-48 mr-6 mb-6"
                    src="{{$apiary->photo ? asset('storage/' . $apiary->photo) : asset('images/apiary_logo.png')}}"
                    alt=""
                />

                <h3 class="text-2xl mb-2">{{$apiary->name}}</h3>
                <div class="text-xl font-bold mb-4">Pogoda</div>
                <ul class="flex">
                    <li
                        class="bg-black text-white rounded-xl px-3 py-1 mr-2"
                    >
                        <a href="#">Liczba uli</a>
                    </li>
                    <li
                        class="bg-black text-white rounded-xl px-3 py-1 mr-2"
                    >
                        <a href="#">Liczba ramek</a>
                    </li>
                </ul>
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{$apiary->city . ', '. $apiary->street_name . ' '. $apiary->street_number}}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Opis pasieki
                    </h3>
                    <div class="text-lg space-y-6">
                        {{$apiary->description}}
                    </div>
                </div>
            </div>
        </x-card>

        <x-card class="mt-4 p-2 flex space-x-6">
            <a href="/apiaries/{{$apiary->id}}/edit">
                <i class="fa-solid fa-pencil"></i>
                Edytuj
            </a>
            <form method="POST" action="/apiaries/{{$apiary->id}}" >
                @csrf
                @method('DELETE')

                <button class="text-red-500">
                    <i class="fa-solid fa-trash"></i>
                    Usuń
                </button>
            </form>
        </x-card>

        <x-card>

        </x-card>

    </div>

</x-layout>
