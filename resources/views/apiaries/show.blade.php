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
                    class="w-48 mb-6"
                    src="{{$apiary->photo ? asset('storage/' . $apiary->photo) : asset('images/apiary_logo.png')}}"
                    alt=""
                />

                <h3 class="text-2xl">
                        <div class="rounded px-6 py-1 mb-2 text-center w-fit text-amber-500">
                            <span class="font-semibold">{{$apiary->name}}</span>
                            <i class="fa-solid fa-wheat-awn"></i>
                        </div>
                    </a>
                </h3>
                <div class="text-xl font-bold mb-4 text-blue-400">
                    <i class="fa-solid fa-cloud-sun" style="color: #60A5FA;"></i>   Pogoda
                </div>
                <div class="text-xl font-semibold text-green-700 mb-4 max-w-lg">
                    <i class="fa-solid fa-seedling" style="color: #15803d;"></i>
                    Roślinność:
                    @foreach($apiary->floras as $flora)
                        <span class="bg-green-100 px-2 rounded text-lg whitespace-pre">{{$flora->name}}</span>
                    @endforeach
                </div>
                <ul class="flex">
                    <li
                        class="flex items-center justify-center bg-laravel text-white rounded py-1 px-3 mr-2 text-xs"
                    >
                        <p class="text-base">Liczba uli:
                            <span class="font-bold text-amber-300">{{$apiary->countBeehives()}}</span>
                            <i class="fa-brands fa-hive" style="color: #fcd34d;"></i>
                        </p>
                    </li>
                    <li
                        class="flex items-center justify-center bg-laravel text-white rounded py-1 px-3 mr-2 text-xs"
                    >
                        <p class="text-base">Liczba ramek:
                            <span class="font-bold text-amber-300">{{$apiary->getTotalBeehivesFrames()}}</span>
                            <i class="fa-solid fa-table-cells-large fa-sm" style="color: #fcd34d;"></i>
                        </p>
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
                <div class="border border-gray-200 w-full mb-6 mt-4"></div>
                <ul class="flex">
                    <li
                        class="flex items-center justify-center bg-sky-900 hover:bg-sky-700 text-white rounded py-1 px-3 mr-2 text-xs"
                    >
                        <a href="{{ route('beehives_index', ['apiary' => $apiary->id]) }}" class="text-base uppercase">Zarządzaj ulami
                            <i class="fa-solid fa-gear"></i>
                        </a>
                    </li>
                    <li
                        class="flex items-center justify-center bg-emerald-900 hover:bg-emerald-700 text-white rounded py-1 px-3 mr-2 text-xs"
                    >
                        <a href="{{ route('beehives_create', ['apiary' => $apiary->id]) }}" class="text-base uppercase">Dodaj ul
                            <i class="fa-solid fa-plus fa-lg"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </x-card>

    </div>

</x-layout>
