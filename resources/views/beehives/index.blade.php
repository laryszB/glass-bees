<x-layout class="bg-indigo-50">
    @include('partials._hero_beehives')

    <div class="flex items-center justify-center">
        <h1 class="bg-amber-200 py-4 px-40 text-lg font-medium rounded">
            Ule należące do pasieki:
            <a href="/apiaries/{{$apiary->id}}">
      <span class="font-bold bg-amber-400 rounded text-laravel px-2 py-1 ml-2 hover:bg-amber-500">
        <i class="fa-solid fa-wheat-awn"></i> {{ $apiary->name }}
      </span>
            </a>

        </h1>
        <a class="ml-10 bg-orange-900 px-4 py-2 rounded text-lg text-white hover:bg-orange-700" href="{{ route('beehives_create', $apiary) }}">
            DODAJ NOWY UL <i class="fa-solid fa-plus"></i>
        </a>
    </div>
    @unless($beehives->isEmpty())
    <div class="flex flex-wrap lg:justify-start justify-center mx-5">
        @foreach ($beehives as $beehive)
            <div class="max-w-xs mx-4 my-8 bg-yellow-900 rounded-md p-8 shadow-lg">
                <h2 class="text-2xl font-bold text-white mb-4">{{$beehive->name}}</h2>
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
                <div class="flex justify-between mt-4">
                    <a href="{{route('beehives_show', ['apiary'=>$apiary, 'beehive' => $beehive])}}" class="bg-green-900 hover:bg-green-800 text-white py-1 px-2 rounded mr-2"><i class="fa-regular fa-clipboard"></i> Więcej</a>
                    <a href="{{route('beehives_edit', ['apiary'=>$apiary, 'beehive' => $beehive])}}" class="bg-blue-900 hover:bg-blue-800 text-white py-1 px-2 rounded mr-2"> <i class="fa-solid fa-pen"></i> Edytuj</a>
                    <x-delete-form class="bg-red-900 hover:bg-red-800 text-white py-1 px-2 rounded" action="{{route('beehives_delete', ['apiary'=>$apiary, 'beehive' => $beehive])}}">
                    </x-delete-form>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6 p-4 flex justify-end">
        {{$beehives->links()}}
    </div>
    @else
        <div class="flex items-center justify-center mt-4">
            <p class="bg-indigo-200 p-2">Ta pasieka nie posiada żadnych uli.
                <a class="font-semibold text-laravel hover:text-amber-900 p-1 rounded" href="{{route('beehives_create', $apiary)}}">
                    Chcesz dodać pierwszy ul?
                </a>
            </p>
        </div>
    @endunless

</x-layout>


