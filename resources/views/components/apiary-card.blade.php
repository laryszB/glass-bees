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
            <div class="text-xl font-bold mb-4 text-blue-400">
                <i class="fa-solid fa-cloud-sun" style="color: #60A5FA;"></i>   Pogoda
            </div>
            <div class="text-xl font-semibold text-green-700 mb-4">
                <i class="fa-solid fa-seedling" style="color: #15803d;"></i>
                Roślinność:
                @foreach($apiary->floras as $flora)
                    <span class="bg-green-100 px-2 rounded text-lg whitespace-pre">{{$flora->name}}</span>
                @endforeach
            </div>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$apiary->city . ', '. $apiary->street_name . ' '. $apiary->street_number}}
            </div>
        </div>
    </div>
</x-card>
