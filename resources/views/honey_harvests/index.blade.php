<x-layout class="bg-yellow-50">
    <div class="text-center mt-4">
        <h1 class="text-4xl font-bold uppercase">Rejestr zbiorów miodu <i class="fa-solid fa-jar"></i></h1>
    </div>

    @if(count($apiaries) === 0)
        <div class="flex flex-col items-center mt-6">
            <p>Nie zarejestrowałeś jeszcze żadnego zbioru miodu.</p>
            <span class="text-fuchsia-600 hover:text-fuchsia-400"><a href="{{route('honeyharvests_create')}}">Chcesz to zrobić? <i class="fa-solid fa-utensils"></i></a></span>
        </div>
    @else
        <div class="divide-y divide-gray-400 max-w-4xl mx-auto mt-8 text-white">
            @foreach ($apiaries as $apiary)
                <div class="py-4" x-data="{ apiaryOpen: false }">
                    <h2 class="px-4 py-2 bg-yellow-800 cursor-pointer" @click="apiaryOpen = !apiaryOpen">
                        <i class="fa-solid fa-wheat-awn"></i> {{ $apiary->name }}
                        <i x-show="!apiaryOpen" class="fa-solid fa-chevron-down"></i>
                        <i x-show="apiaryOpen" class="fa-solid fa-chevron-up"></i>
                    </h2>

                    <div x-show="apiaryOpen" x-cloak>
                        @foreach ($apiary->harvestsGroupedByYear as $year => $harvests)
                            <div class="px-4 py-2 bg-yellow-600" x-data="{ yearOpen: false }">
                                <div class="cursor-pointer" @click="yearOpen = !yearOpen">
                                    {{ $year }}
                                    <i x-show="!yearOpen" class="fa-solid fa-chevron-down"></i>
                                    <i x-show="yearOpen" class="fa-solid fa-chevron-up"></i>
                                </div>

                                <div x-show="yearOpen">
                                    <table class="min-w-full bg-yellow-300 text-black">
                                        <thead>
                                        <tr>
                                            <th class="px-4 py-2 text-center border">Data</th>
                                            <th class="px-4 py-2 text-center border">Waga</th>
                                            <th class="px-4 py-2 text-center border">Kg miodu/ul</th>
                                            <th class="px-4 py-2 text-center border">Objętość</th>
                                            <th class="px-4 py-2 text-center border">Cena</th>
                                            <th class="px-4 py-2 text-center border">Zysk</th>
                                            <th class="px-4 py-2 text-center border"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($harvests as $harvest)
                                            <tr>
                                                <td class="border px-4 py-2 text-center">{{ date('d-m-Y', strtotime($harvest->harvest_date)) }}</td>
                                                <td class="border px-4 py-2 text-center">{{ $harvest->weight }} kg</td>
                                                <td class="border px-4 py-2 text-center">{{ $harvest->average_weight_per_beehive }} kg</td>
                                                <td class="border px-4 py-2 text-center">{{ $harvest->volume }} l</td>
                                                <td class="border px-4 py-2 text-center">{{ $harvest->price }} zł/kg</td>
                                                <td class="border px-4 py-2 text-center">{{ $harvest->profit }} zł</td>
                                                <td class="border px-4 py-2 text-center">
                                                    <x-delete-form action="{{route('honeyharvests_destroy', ['harvest' => $harvest])}}" class="text-red-300 bg-red-800 px-2 hover:bg-red-500 hover:text-red-100">
                                                    </x-delete-form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        {{-- APIARIES STRENGTH CHART--}}
        <div class="mt-8 flex justify-center">
            <div class="w-full max-w-sm">
                <div class="ml-1 font-bold">
                    <label for="yearSelect">Wybierz rok zbiorów:</label>
                </div>
                <select id="yearSelect" class="w-full mt-2 p-1 border-2 border-green-700">
                    @foreach ($years as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="mt-8 flex justify-center">
            <div class="w-full max-w-4xl">
                <canvas id="strengthChart"></canvas>
            </div>
        </div>

        @vite('resources/js/apiaries-strength-chart.js')


        {{-- PROFIT CHART--}}
        <div class="mt-8 flex justify-center">
            <div class="w-full max-w-sm">
                <div class="ml-1 font-bold">
                    <label for="apiarySelect">Wybierz pasiekę aby wyświetlić zysk w czasie:</label>
                </div>
                <select id="apiarySelect" class="w-full mt-2 p-1 border-2 border-green-700">
                    @foreach ($apiaries as $apiary)
                        <option value="{{ $apiary->id }}">{{ $apiary->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="mt-8 flex justify-center">
            <div class="w-full max-w-4xl">
                <canvas id="harvestChart"></canvas>
            </div>
        </div>

        @vite('resources/js/profit-chart.js')

    @endif
</x-layout>
