@props(['apiary', 'beehive'])

@if($beehive->beeColony)
    <h3 class="text-3xl text-white font-bold mb-4 italic">
        Rodzina pszczela <i class="fa-solid fa-people-group"></i>
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
        Rodzina pszczela <i class="fa-solid fa-people-group"></i>
    </h3>
    <p class="bg-gray-700 px-4 y-1 text-red-500 rounded-lg font-semibold whitespace-nowrap">Nie masz do tego ula przypisanej rodziny pszczelej</p>
    <div class="text-lg mt-4">

        <a href="{{route('beecolonies_create', ['apiary' => $apiary, 'beehive' => $beehive])}}" class="font-semibold text-amber-400 bg-gray-700 rounded-lg py-1 px-4 hover:bg-gray-600 hover:text-amber-300"><i class="fa-solid fa-plus"></i> Utwórz rodzinę pszczelą</a>
    </div>
@endif
