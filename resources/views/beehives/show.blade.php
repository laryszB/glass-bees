<x-layout>

    <a href="/" class="inline-block text-black ml-4 mb-4"
    ><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-60">
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
                        class="flex items-center justify-center bg-amber-700 text-white rounded py-1 px-3 mr-2 text-xs"
                    >
                        <p class="text-base"><i class="fa-solid fa-hashtag"></i> Typ ula:
                            <span class="font-bold font-bold text-lime-400">{{$beehive->type}}</span>

                        </p>
                    </li>
                    <li
                        class="flex items-center justify-center bg-amber-700 text-white rounded py-1 px-3 mr-2 text-xs"
                    >
                        <p class="text-base"><i class="fa-solid fa-hashtag"></i> Rodzaj dennicy
                            <span class="font-bold text-lime-400">{{$beehive->bottoms}}</span>
                        </p>
                    </li>
                    <li
                        class="flex items-center justify-center bg-amber-700 text-white rounded py-1 px-3 mr-2 text-xs"
                    >
                        <p class="text-base"><i class="fa-solid fa-hashtag"></i> Liczba korpusów
                            <span class="font-bold text-lime-400">{{$beehive->bodies}}</span>
                        </p>
                    </li>
                    <li
                        class="flex items-center justify-center bg-amber-700 text-white rounded py-1 px-3 mr-2 text-xs"
                    >
                        <p class="text-base"><i class="fa-solid fa-hashtag"></i> Liczba nadstawek
                            <span class="font-bold text-lime-400">{{$beehive->extensions}}</span>
                        </p>
                    </li>
                    <li
                        class="flex items-center justify-center bg-amber-700 text-white rounded py-1 px-3 mr-2 text-xs"
                    >
                        <p class="text-base"><i class="fa-solid fa-hashtag"></i> Liczba półnadstawek
                            <span class="font-bold text-lime-400">{{$beehive->half_extensions}}</span>
                        </p>
                    </li>
                    <li
                        class="flex items-center justify-center bg-amber-700 text-white rounded py-1 px-3 mr-2 text-xs"
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
            </div>
        </x-card>

    </div>

</x-layout>
