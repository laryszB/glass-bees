<x-layout>

    <a href="/" class="inline-block text-black ml-4 mb-4"
    ><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-auto flex justify-center">
        <x-card class="bg-amber-900">
            <div
                class="flex flex-col items-center justify-center text-center"
            >
                <h3 class="text-4xl">
                    <div class="rounded px-6 py-1 mb-2 text-center w-fit text-white">
                        <span class="font-semibold">{{$beehive->name}}</span>
                        <i class="fa-brands fa-hive"></i>
                    </div>
                    </a>
                </h3>
                <div class="border border-gray-200 w-full mb-6"></div>
                <ul class="flex flex-col lg:justify-center lg:flex-row">
                    <li
                        class="flex items-center justify-center bg-amber-700 text-white rounded py-1 px-3 mr-2 text-xs mb-2 lg:mb-0"
                    >
                        <p class="text-base"><i class="fa-solid fa-hashtag"></i> Typ ula:
                            <span class="font-bold font-bold text-lime-400">{{$beehive->type}}</span>

                        </p>
                    </li>
                    <li
                        class="flex items-center justify-center bg-amber-700 text-white rounded py-1 px-3 mr-2 text-xs mb-2 lg:mb-0"
                    >
                        <p class="text-base"><i class="fa-solid fa-hashtag"></i> Rodzaj dennicy
                            <span class="font-bold text-lime-400">{{$beehive->bottoms}}</span>
                        </p>
                    </li>
                    <li
                        class="flex items-center justify-center bg-amber-700 text-white rounded py-1 px-3 mr-2 text-xs mb-2 lg:mb-0"
                    >
                        <p class="text-base"><i class="fa-solid fa-hashtag"></i> Liczba korpusów
                            <span class="font-bold text-lime-400">{{$beehive->bodies}}</span>
                        </p>
                    </li>
                    <li
                        class="flex items-center justify-center bg-amber-700 text-white rounded py-1 px-3 mr-2 text-xs mb-2 lg:mb-0"
                    >
                        <p class="text-base"><i class="fa-solid fa-hashtag"></i> Liczba nadstawek
                            <span class="font-bold text-lime-400">{{$beehive->extensions}}</span>
                        </p>
                    </li>
                    <li
                        class="flex items-center justify-center bg-amber-700 text-white rounded py-1 px-3 mr-2 text-xs mb-2 lg:mb-0"
                    >
                        <p class="text-base"><i class="fa-solid fa-hashtag"></i> Liczba półnadstawek
                            <span class="font-bold text-lime-400">{{$beehive->half_extensions}}</span>
                        </p>
                    </li>
                    <li
                        class="flex items-center justify-center bg-amber-700 text-white rounded py-1 px-3 mr-2 text-xs mb-2 lg:mb-0"
                    >
                        <p class="text-base"><i class="fa-solid fa-hashtag"></i> Liczba ramek
                            <span class="font-bold text-lime-400">{{$beehive->frames}}</span>
                        </p>
                    </li>
                </ul>
                <div class="border border-gray-200 w-full mb-6 mt-6"></div>
                <div>
                    <h3 class="text-3xl text-white font-bold mb-4">
                        Opis ula
                    </h3>
                    <div class="text-lg text-amber-300 space-y-6">
                        {{$beehive->description}}
                    </div>
                </div>
                <div class="border border-gray-200 w-full mb-6 mt-4"></div>
                <div>
                    <h3 class="text-3xl text-white font-bold mb-4 italic">
                        Notatka
                    </h3>
                    <div class="text-lg text-gray-200 space-y-6 italic">
                        {{$beehive->note}}
                    </div>
                </div>
                <div class="border border-gray-200 w-full mb-6 mt-4"></div>
                <div>
                    @if($beehive->beeColony)
                        <h3 class="text-3xl text-white font-bold mb-4 italic">
                            Rodzina pszczela
                        </h3>
                        <div class="text-lg space-y-2 mt-4 text-amber-400 bg-gray-700 py-4 px-8 rounded-lg w-96 break-words">
                            <p><span class="font-bold">Nazwa: </span> {{ $beehive->beeColony->name }}</p>
                            <p><span class="font-bold">Siła: </span>{{ $beehive->beeColony->strength }}</p>
                            <p><span class="font-bold">Temperament: </span> {{ $beehive->beeColony->temperament }}</p>
                            <p><span class="font-bold">Opis: </span> {{ $beehive->beeColony->description }}</p>
                        </div>
                        <div class="text-lg space-y-2 mt-2 text-amber-400 bg-gray-700 px-8 py-1 rounded-lg w-96 break-words font-bold">
                            <a class="hover:text-amber-200" href="{{route('beecolonies_edit', ['apiary' => $apiary, 'beehive' => $beehive, 'beeColony' => $beehive->beeColony])}}"><i class="fa-solid fa-pencil"></i> Edytuj</a>
                        </div>
                    @else
                        <h3 class="text-3xl text-white font-bold mb-4 italic">
                            Rodzina pszczela
                        </h3>
                        <p class="bg-gray-700 px-4 y-1 text-red-500 rounded-lg font-semibold">Nie masz do tego ula przypisanej rodziny pszczelej</p>
                        <div class="text-lg mt-4">

                            <a href="{{route('beecolonies_create', ['apiary' => $apiary, 'beehive' => $beehive])}}" class="font-semibold text-amber-400 bg-gray-700 rounded-lg py-1 px-4 hover:bg-gray-600 hover:text-amber-300">Utwórz rodzinę pszczelą</a>
                        </div>
                    @endif
                </div>
            </div>
        </x-card>

    </div>

</x-layout>
