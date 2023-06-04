<x-layout class="bg-indigo-50">
    @include('partials._hero_beehives')

    <div x-data="{ showDetails: false }">

        <div class="flex flex-col md:flex-row items-center justify-center space-y-4 md:space-y-0 md:space-x-4">
            <h1 class="bg-amber-200 md:py-2 px-6 py-6 text-lg font-medium rounded text-center">
                Ule należące do pasieki:
                <a href="/apiaries/{{$apiary->id}}" class="block md:inline mt-2">
                <span class="font-bold bg-amber-400 rounded text-laravel px-2 py-1 ml-2 hover:bg-amber-500">
                    <i class="fa-solid fa-wheat-awn"></i> {{ $apiary->name }}
                </span>
                </a>
            </h1>
            <a class="bg-orange-900 px-4 py-2 rounded text-lg text-white hover:bg-orange-700 text-center" href="{{ route('beehives_create', $apiary) }}">
                DODAJ NOWY UL <i class="fa-solid fa-plus"></i>
            </a>
            <button @click="showDetails = !showDetails" class="bg-orange-800 hover:bg-orange-600 text-white text-lg font-bold py-2 px-4 rounded">
                Szczegóły uli <i class="fa-solid fa-up-down"></i>
            </button>
        </div>

        @unless($beehives->isEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 mx-5 mt-5">
                @foreach ($beehives as $beehive)
                    <div class="max-w-xs mx-auto md:mx-0 bg-yellow-900 rounded-md p-8 shadow-lg mt-5 word-break: break-all" x-data="{ showModal: false }">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-2xl font-bold text-white">{{$beehive->name}}</h2>
                            <div class="flex justify-end">
                                <i class="fa-regular fa-note-sticky text-white hover:text-amber-200 hover:cursor-pointer fa-xl" @click="showModal = true"></i>
                            </div>
                        </div>
                        <div x-show="showDetails">
                            <div class="flex justify-between items-center mb-4">
                                <p class="text-gray-400 text-lg pr-6">Typ ula:</p>
                                <p class="text-gray-100 text-lg">{{$beehive->type}}</p>
                            </div>
                            <hr class="my-2 border-gray-500">
                            <div class="flex justify-between items-center mb-4">
                                <p class="text-gray-400 text-lg pr-6">Liczba korpusów:</p>
                                <p class="text-gray-100 text-lg">{{$beehive->bodies}}</p>
                            </div>
                            <hr class="my-2 border-gray-500">
                            <div class="flex justify-between items-center mb-4">
                                <p class="text-gray-400 text-lg pr-6">Rodzaj dennicy:</p>
                                <p class="text-gray-100 text-lg">{{$beehive->bottoms}}</p>
                            </div>
                            <hr class="my-2 border-gray-500">
                            <div class="flex justify-between items-center mb-4">
                                <p class="text-gray-400 text-lg pr-6">Liczba nadstawek:</p>
                                <p class="text-gray-100 text-lg">{{$beehive->extensions}}</p>
                            </div>
                            <hr class="my-2 border-gray-500">
                            <div class="flex justify-between items-center mb-4">
                                <p class="text-gray-400 text-lg pr-6">Liczba półnadstawek:</p>
                                <p class="text-gray-100 text-lg">{{$beehive->half_extensions}}</p>
                            </div>
                            <hr class="my-2 border-gray-500">
                            <div class="flex justify-between items-center">
                                <p class="text-gray-400 text-lg pr-6">Liczba ramek:</p>
                                <p class="text-gray-100 text-lg">{{$beehive->frames}}</p>
                            </div>
                        </div>

                        <div class="flex justify-between mt-4">
                            <a href="{{route('beehives_show', ['apiary'=>$apiary, 'beehive' => $beehive])}}" class="bg-green-900 hover:bg-green-800 text-white py-1 px-2 rounded mr-2"><i class="fa-regular fa-clipboard"></i> Więcej</a>
                            <a href="{{route('beehives_edit', ['apiary'=>$apiary, 'beehive' => $beehive])}}" class="bg-blue-900 hover:bg-blue-800 text-white py-1 px-2 rounded mr-2"> <i class="fa-solid fa-pen"></i> Edytuj</a>
                            <x-delete-form class="bg-red-900 hover:bg-red-800 text-white py-1 px-2 rounded" action="{{route('beehives_delete', ['apiary'=>$apiary, 'beehive' => $beehive])}}">
                            </x-delete-form>
                        </div>

                        {{--            OKNO WYŚWIETLAJĄCE NOTATKĘ ALPINE JS--}}
                        <x-beehive-note-window :apiary="$apiary" :beehive="$beehive">
                        </x-beehive-note-window>

                    </div>
                @endforeach
            </div>

        <div class="mt-6 p-4 flex justify-end">
            {{$beehives->links()}}
        </div>

        @else
            <div class="flex items-center justify-center bg-indigo-200 mt-4">
                <p class=" p-2">Ta pasieka nie posiada żadnych uli.
                    <a class="font-semibold text-laravel hover:text-amber-900 p-1 rounded" href="{{route('beehives_create', $apiary)}}">
                        Chcesz dodać pierwszy ul?
                    </a>
                </p>
            </div>
        @endunless
    </div>

</x-layout>


