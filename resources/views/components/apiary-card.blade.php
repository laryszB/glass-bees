@props(['apiary'])

<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{asset('images/apiary_logo.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/apiaries/{{$apiary->id}}">{{$apiary->name}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">Pogoda</div>
            <ul class="flex">
                <li
                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                >
                    <p>Liczba uli</p>
                </li>
                <li
                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                >
                    <p>Liczba ramek</p>
                </li>
            </ul>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$apiary->city . ', '. $apiary->street_name . ' '. $apiary->street_number}}
            </div>
        </div>
    </div>
</x-card>
