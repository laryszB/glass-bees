@props(['apiary'])

<x-card>
    <div class="flex">
        <img
            class="hidden w-52 mr-6 md:block"
            src="{{$apiary->photo ? asset('storage/' . $apiary->photo) : asset('images/apiary_logo.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/apiaries/{{$apiary->id}}">
                    <div class="bg-laravel rounded px-6 py-1 mb-2 text-center w-fit text-white hover:bg-amber-400">
                        <span class="font-semibold">{{$apiary->name}}</span>
                        <i class="fa-solid fa-wheat-awn"></i>
                    </div>
                </a>
            </h3>
            <div class="text-lg font-bold mb-4 text-blue-400">
                @if ($apiary->weather_data)
                    <div class="weather-info flex">
                        <!-- Ikona -->
                        <div class="weather-icon flex-shrink-0 mt-4" style="height: 3.6em;">
                            <i class="{{ $apiary->weather_icon }}" style="font-size: 3em;"></i>
                        </div>
                        <!-- Dane pogodowe -->
                        <div class="weather-data ml-4">
                            <div><i class="fa-solid fa-temperature-full"></i> Temperatura: {{ $apiary->weather_data->main->temp ?? 'N/A' }}°C</div>
                            <div><i class="fa-solid fa-droplet"></i> Wilgotność: {{ $apiary->weather_data->main->humidity ?? 'N/A' }}%</div>
                            <div><i class="fa-solid fa-wind"></i> Prędkość wiatru: {{ $apiary->weather_data->wind->speed ?? 'N/A' }} m/s</div>
                        </div>
                    </div>
                @else
                    <div class="weather-info">
                        <div>Brak danych pogodowych dla tej pasieki <i data-tippy-content="Brak informacji o pogodzie może wynikać z błędnego adresu pasieki. Upewnij się, że wprowadziłeś prawidłowy adres." class="fa-solid fa-circle-info"></i></div>
                    </div>
                @endif
            </div>

            <div class="text-xl font-semibold text-green-700 mb-4">
                <i class="fa-solid fa-seedling" style="color: #15803d;"></i>
                Roślinność:
                @foreach($apiary->floras as $flora)
                    <span data-tippy-content="{{$flora->description}}" class="bg-green-100 px-2 rounded text-lg whitespace-pre cursor-default">{{$flora->name}}</span>
                @endforeach
            </div>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$apiary->city . ', '. $apiary->street_name . ' '. $apiary->street_number}}
            </div>
        </div>
    </div>
</x-card>
