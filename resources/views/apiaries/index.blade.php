<x-layout>
    @include('partials._hero')

    @auth
        <x-card class="p-2 mx-4 mb-4 bg-yellow-200">
            <ul class="flex">
                <li
                    class="flex items-center justify-center text-white py-1 px-4 mr-2"
                >
                    <p class="text-xl text-black font-bold uppercase">Twoje statystyki:
                    </p>
                </li>
                <li
                    class="flex items-center justify-center bg-violet-400 text-white rounded-xl py-1 px-3 mr-2"
                >
                    <p class="text-lg">Liczba posiadanych pasiek:
                        <span class="font-bold text-yellow-200">{{auth()->user()->apiaries()->count()}}</span>
                        <i class="fa-brands fa-hive" style="color: #fef08a;"></i>
                    </p>
                </li>
                <li
                    class="flex items-center justify-center bg-violet-400 text-white rounded-xl py-1 px-3 mr-2"
                >
                    <p class="text-lg">Liczba ramek:
                    <span class="font-bold text-yellow-200">50</span>
                    <i class="fa-solid fa-table-cells-large fa-sm" style="color: #fef08a;"></i>
                    </p>
                </li>
            </ul>
        </x-card>
        @include('partials._search')

        <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

            @foreach($apiaries as $apiary)
                <x-apiary-card :apiary="$apiary">
                </x-apiary-card>
            @endforeach

        </div>

        <div class="mt-6 p-4 flex justify-end">
            {{$apiaries->links()}}
        </div>
    @else
        @include('partials._app_functions_info')
    @endauth
</x-layout>


