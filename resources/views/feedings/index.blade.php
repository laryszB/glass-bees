<x-layout class="bg-fuchsia-50">


    <div class="text-center mt-4">
        <h1 class="text-4xl font-bold uppercase">Rejestr karmień</h1>
    </div>

    @if($apiaries->isEmpty())
        <div class="flex flex-col items-center mt-6">
            <p >Nie zarejestrowałeś jeszcze żadnego karmienia. </p>
            <span class="text-fuchsia-600 hover:text-fuchsia-400"><a href="{{route('feedings_create')}}">Chcesz to zrobić? <i class="fa-solid fa-utensils"></i></a></span>
        </div>

    @else

        <div class="divide-y divide-gray-200 max-w-4xl mx-auto mt-8 text-white">
            @foreach ($apiaries as $apiary)
                <div class="py-4" x-data="{ apiaryOpen: false }">
                    <h2 class="px-4 py-2 bg-purple-800 cursor-pointer" @click="apiaryOpen = !apiaryOpen">
                        <i class="fa-solid fa-wheat-awn"></i>  {{ $apiary->name }}
                        <i x-show="!apiaryOpen" class="fa-solid fa-chevron-down"></i>
                        <i x-show="apiaryOpen" class="fa-solid fa-chevron-up"></i>
                    </h2>

                    <div x-show="apiaryOpen" x-cloak>
                        @foreach ($apiary->beehives as $beehive)
                            <div class="px-4 py-2 bg-purple-600" x-data="{ beehiveOpen: false }">
                                <div class="cursor-pointer" @click="beehiveOpen = !beehiveOpen">
                                    {{ $beehive->name }}
                                    @if($beehive->food->count() > 0)
                                        <i data-tippy-content="Ule z tą ikonką posiadają zarejestrowane karmienia" class="fa-solid fa-utensils"></i>
                                    @endif
                                    <i x-show="!beehiveOpen" class="fa-solid fa-chevron-down"></i>
                                    <i x-show="beehiveOpen" class="fa-solid fa-chevron-up"></i>
                                </div>

                                <div x-show="beehiveOpen">
                                    @if($beehive->food->count() > 0)
                                        @foreach ($beehive->food->sortByDesc('pivot.feeding_date') as $feeding)
                                            <div class="px-4 py-2 bg-purple-400" x-data="{ feedingOpen: false }" :class="{ 'flex flex-col': feedingOpen, 'flex justify-between items-center': !feedingOpen }">
                                                <div class="cursor-pointer" @click="feedingOpen = !feedingOpen">
                                                    Karmienie z dnia: {{ date('d-m-Y', strtotime($feeding->pivot->feeding_date)) }}
                                                    <i x-show="!feedingOpen" class="fa-solid fa-chevron-down"></i>
                                                    <i x-show="feedingOpen" class="fa-solid fa-chevron-up"></i>
                                                </div>

                                                <x-delete-form action="{{ route('feedings_destroy', ['beehive_id' => $beehive->id, 'food_id' => $feeding->id]) }}" class="text-red-300 bg-red-800 px-2 hover:bg-red-500 hover:text-red-100" x-show="!feedingOpen">
                                                </x-delete-form>

                                                <div x-show="feedingOpen" class="p-4 space-y-2 w-full">
                                                    <p>Nazwa pokarmu: {{ $feeding->name }}</p>
                                                    <p>Ilość: {{ $feeding->pivot->amount }} kg</p>
                                                    <p>Godzina karmienia: {{ date('H:i', strtotime($feeding->pivot->feeding_date)) }}</p>
                                                    <p>Notatki: {{ $feeding->pivot->note }}</p>
                                                </div>
                                            </div>


                                        @endforeach
                                    @else
                                        <div class="p-4">
                                            <p>W tym ulu nie ma żadnego zarejestrowanego karmienia.</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</x-layout>
