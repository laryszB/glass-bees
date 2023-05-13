@props(['apiary'])

<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{$apiary->photo ? asset('storage/' . $apiary->photo) : asset('images/apiary_logo.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/apiaries/{{$apiary->id}}">
                    <div class="bg-laravel rounded px-6 py-1 mb-2 text-center w-fit text-white hover:bg-amber-400">
                        <span class="font-semibold">{{$apiary->name}}</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </div>
                </a>
            </h3>
            <div class="text-xl font-bold mb-4">Pogoda</div>
            <ul class="flex">
                <li
                    class="flex items-center justify-center bg-laravel text-white rounded py-1 px-3 mr-2 text-xs"
                >
                    <p class="text-base">Liczba uli:
                        <span class="font-bold text-amber-300">43</span>
                        <i class="fa-brands fa-hive" style="color: #fcd34d;"></i>
                    </p>
                </li>
                <li
                    class="flex items-center justify-center bg-laravel text-white rounded py-1 px-3 mr-2 text-xs"
                >
                    <p class="text-base">Liczba ramek:
                        <span class="font-bold text-amber-300">50</span>
                        <i class="fa-solid fa-table-cells-large fa-sm" style="color: #fcd34d;"></i>
                    </p>
                </li>
            </ul>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$apiary->city . ', '. $apiary->street_name . ' '. $apiary->street_number}}
            </div>
        </div>
    </div>
</x-card>
