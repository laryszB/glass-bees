<x-layout>

    <a href="/" class="inline-block text-black ml-4 mb-4"
    ><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-auto flex justify-center">

        <x-card class="bg-amber-900 relative">
            <!-- Dropdown menu -->
            <div x-data="{ open: false }" class="absolute right-0 top-0 mt-2 mr-2">
                <button
                    @click="open = !open"
                    class="bg-amber-700 text-white font-bold py-1 px-10 rounded inline-flex items-center hover:bg-amber-600"
                >
                    <i class="fa-solid fa-caret-down"></i>
                </button>
                <ul
                    x-show="open"
                    x-cloak
                    @click.away="open = false"
                    class="absolute pt-1 z-20 w-full"
                >
                    <li>
                        <a href="{{route('beehives_edit', ['apiary'=>$apiary, 'beehive' => $beehive])}}" class="text-white text-center bg-amber-700 hover:bg-amber-600 py-1 px-3 block whitespace-no-wrap font-medium w-full"> <i class="fa-solid fa-pen"></i> Edytuj</a>
                    </li>
                    <li>
                        <x-delete-form class="text-white bg-amber-700 hover:bg-amber-600 py-1 px-3 block whitespace-no-wrap font-medium w-full" action="{{route('beehives_delete', ['apiary'=>$apiary, 'beehive' => $beehive])}}">
                        </x-delete-form>
                    </li>
                </ul>
            </div>
            <!-- End of Dropdown menu -->
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
                <h3 class="text-3xl text-white font-bold mb-4">
                    Dane <i class="fas fa-cubes"></i>
                </h3>
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
                        <p class="text-base"><i class="fa-solid fa-hashtag"></i> Rodzaj dennicy:
                            <span class="font-bold text-lime-400">{{$beehive->bottoms}}</span>
                        </p>
                    </li>
                    <li
                        class="flex items-center justify-center bg-amber-700 text-white rounded py-1 px-3 mr-2 text-xs mb-2 lg:mb-0"
                    >
                        <p class="text-base"><i class="fa-solid fa-hashtag"></i> Liczba korpusów:
                            <span class="font-bold text-lime-400">{{$beehive->bodies}}</span>
                        </p>
                    </li>
                    <li
                        class="flex items-center justify-center bg-amber-700 text-white rounded py-1 px-3 mr-2 text-xs mb-2 lg:mb-0"
                    >
                        <p class="text-base"><i class="fa-solid fa-hashtag"></i> Liczba nadstawek:
                            <span class="font-bold text-lime-400">{{$beehive->extensions}}</span>
                        </p>
                    </li>
                    <li
                        class="flex items-center justify-center bg-amber-700 text-white rounded py-1 px-3 mr-2 text-xs mb-2 lg:mb-0"
                    >
                        <p class="text-base"><i class="fa-solid fa-hashtag"></i> Liczba półnadstawek:
                            <span class="font-bold text-lime-400">{{$beehive->half_extensions}}</span>
                        </p>
                    </li>
                    <li
                        class="flex items-center justify-center bg-amber-700 text-white rounded py-1 px-3 mr-2 text-xs mb-2 lg:mb-0"
                    >
                        <p class="text-base"><i class="fa-solid fa-hashtag"></i> Liczba ramek:
                            <span class="font-bold text-lime-400">{{$beehive->frames}}</span>
                        </p>
                    </li>
                </ul>
                <div class="border border-gray-200 w-full mb-6 mt-6"></div>
                <div>
                    <h3 class="text-3xl text-white font-bold mb-4">
                        Akcesoria <i class="fa-solid fa-screwdriver-wrench"></i>
                    </h3>
                    <div class="flex flex-col space-y-2 md:flex-row md:space-y-0">
                    @foreach($beehive->beehiveAccessories as $beehiveAccessory)
                        <span data-tippy-content="{{$beehiveAccessory->description}}" class="bg-sky-900 px-4 py-1 mr-2 rounded text-lg text-white whitespace-pre cursor-default">{{$beehiveAccessory->name}}</span>
                    @endforeach
                    </div>
                </div>
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
                <div class="flex flex-col space-y-6 lg:flex-row lg:space-x-28 lg:space-y-0">
                    <div class="w-full lg:w-1/2">
                        <x-mother-bee-card :apiary="$apiary" :beehive="$beehive">
                        </x-mother-bee-card>
                    </div>

                    <div class="w-full lg:w-1/2">
                        <x-bee-colony-card :apiary="$apiary" :beehive="$beehive">
                        </x-bee-colony-card>
                    </div>
                </div>
            </div>
        </x-card>

    </div>

</x-layout>
