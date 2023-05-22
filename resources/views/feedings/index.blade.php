<x-layout>

    @foreach ($apiaries as $apiary)
        <div class="border-b border-gray-200">
            <h2 class="px-4 py-2 bg-gray-200">{{ $apiary->name }}</h2>
            @foreach ($apiary->beehives as $beehive)
                <h3 class="px-4 py-2 bg-gray-100">{{ $beehive->name }}</h3>
                @foreach ($beehive->food->sortByDesc('pivot.feeding_date') as $feeding)
                    <div class="p-4 space-y-2">
                        <p>Nazwa pokarmu: {{ $feeding->name }}</p>
                        <p>Data karmienia: {{ $feeding->pivot->feeding_date }}</p>
                        <p>Ilość: {{ $feeding->pivot->amount }}</p>
                        <p>Notatki: {{ $feeding->pivot->note }}</p>
                    </div>
                @endforeach
            @endforeach
        </div>
    @endforeach


</x-layout>
