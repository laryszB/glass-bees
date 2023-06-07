<x-layout class="bg-sky-100">


    <div class="text-center mt-4">
        <h1 class="text-4xl font-bold uppercase">Rejestr chorób <i class="fa-solid fa-syringe"></i></h1>
        <div class="mt-4">
            <a href="{{ route('diseasescases_index') }}" class="hover:text-rose-400 {{ request('status') ? '' : 'text-teal-500' }}">Wszystkie choroby</a> |
            <a href="{{ route('diseasescases_index', ['status' => 'nieleczona']) }}" class="hover:text-rose-400 {{ request('status') === 'nieleczona' ? 'text-teal-500' : '' }}">Nieleczone</a> |
            <a href="{{ route('diseasescases_index', ['status' => 'w trakcie leczenia']) }}" class="hover:text-rose-400 {{ request('status') === 'w trakcie leczenia' ? 'text-teal-500' : '' }}">W trakcie leczenia</a> |
            <a href="{{ route('diseasescases_index', ['status' => 'uleczona']) }}" class="hover:text-rose-400 {{ request('status') === 'uleczona' ? 'text-teal-500' : '' }}">Uleczone</a>

        </div>
    </div>

    @if(!$anyDiseases)
        <div class="flex flex-col items-center mt-6">
            <p >Nie zarejestrowałeś jeszcze żadnej choroby. </p>
            <span class="text-fuchsia-600 hover:text-fuchsia-400"><a href="{{route('diseasescases_create')}}">Chcesz to zrobić? <i class="fa-solid fa-syringe"></i></a></span>
        </div>

    @else

        <div class="divide-y divide-gray-200 max-w-4xl mx-auto mt-8 text-white">
            @foreach ($apiaries as $apiary)
                <div class="py-4" x-data="{ apiaryOpen: false }">
                    <h2 class="px-4 py-2 bg-teal-800 cursor-pointer" @click="apiaryOpen = !apiaryOpen">
                        <i class="fa-solid fa-wheat-awn"></i>  {{ $apiary->name }}
                        <i x-show="!apiaryOpen" class="fa-solid fa-chevron-down"></i>
                        <i x-show="apiaryOpen" class="fa-solid fa-chevron-up"></i>
                    </h2>

                    <div x-show="apiaryOpen" x-cloak>
                        @foreach ($apiary->beehives as $beehive)
                            <div class="px-4 py-2 bg-teal-600" x-data="{ beehiveOpen: false }">
                                <div class="cursor-pointer" @click="beehiveOpen = !beehiveOpen">
                                    {{ $beehive->name }}
{{--                                    {{dd($beehive)}}--}}
                                    @if($beehive->bee_diseases->count() > 0)
                                        <i data-tippy-content="Ule z tą ikonką posiadają odnotowaną chorobę" class="fa-solid fa-syringe"></i>
                                    @endif
                                    <i x-show="!beehiveOpen" class="fa-solid fa-chevron-down"></i>
                                    <i x-show="beehiveOpen" class="fa-solid fa-chevron-up"></i>
                                </div>

                                <div x-show="beehiveOpen">
                                    @if($beehive->bee_diseases->count() > 0)
                                        @foreach ($beehive->bee_diseases->sortByDesc('pivot.feeding_date') as $diseases_case)
                                            <div class="px-4 py-2 bg-teal-400" x-data="{ diseasesCasesOpen: false }" :class="{ 'flex flex-col': diseasesCasesOpen, 'flex justify-between items-center': !diseasesCasesOpen }">
                                                <div class="cursor-pointer" @click="diseasesCasesOpen = !diseasesCasesOpen">
                                                    Choroba z dnia: {{ date('d-m-Y', strtotime($diseases_case->pivot->date)) }}
                                                    <i x-show="!diseasesCasesOpen" class="fa-solid fa-chevron-down"></i>
                                                    <i x-show="diseasesCasesOpen" class="fa-solid fa-chevron-up"></i>
                                                </div>

                                                <x-delete-form action="{{ route('diseasescases_destroy', ['beehive_id' => $beehive->id, 'bee_disease_id' => $diseases_case->id]) }}" class="text-red-300 bg-red-800 px-2 hover:bg-red-500 hover:text-red-100" x-show="!diseasesCasesOpen">
                                                </x-delete-form>

                                                <div x-show="diseasesCasesOpen" class="p-4 space-y-2 w-full">
                                                    <p><span class="font-semibold">Nazwa choroby:</span> {{ $diseases_case->name }}</p>
                                                    <p><span class="font-semibold">Godzina odnotowania choroby:</span> {{ date('H:i', strtotime($diseases_case->pivot->date)) }}</p>
                                                    <p><span class="font-semibold">Objawy:</span> {{ $diseases_case->symptoms }}</p>
                                                    <p><span class="font-semibold">Sugerowane leczenie:</span> {{ $diseases_case->treatment }}</p>
                                                    <p><span class="font-semibold">Notatki:</span> {{ $diseases_case->pivot->note }}</p>
                                                    <form method="POST" action="{{ route('diseasescases_updateDiseaseCaseStatus', ['beehive_id' => $beehive->id, 'bee_disease_id' => $diseases_case->id]) }}">
                                                        @csrf
                                                        @method('PATCH')

                                                        <input type="hidden" name="beehive_id" value="{{ $beehive->id }}">
                                                        <input type="hidden" name="bee_disease_id" value="{{ $diseases_case->id }}">

                                                        <label class="font-semibold">Status: </label>
                                                        <select class="text-gray-700 font-semibold px-2 ml-1" name="status">
                                                            <option class="text-red-400 font-semibold" value="nieleczona" {{ $diseases_case->pivot->status == 'nieleczona' ? 'selected' : '' }}>nieleczona</option>
                                                            <option class="text-yellow-400 font-semibold" value="w trakcie leczenia" {{ $diseases_case->pivot->status == 'w trakcie leczenia' ? 'selected' : '' }}>w trakcie leczenia</option>
                                                            <option class="text-green-400 font-semibold" value="uleczona" {{ $diseases_case->pivot->status == 'uleczona' ? 'selected' : '' }}>uleczona</option>
                                                        </select>

                                                        <button class="ml-2 px-2 bg-teal-200 text-gray-800 hover:text-gray-700 hover:bg-teal-100 font-bold" type="submit">Zmień status</button>
                                                    </form>
                                                </div>
                                            </div>


                                        @endforeach
                                    @else
                                        <div class="p-4">
                                            <p>W tym ulu nie ma żadnej odnotowanej choroby.</p>
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
