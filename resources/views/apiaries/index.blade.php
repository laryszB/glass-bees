<x-layout>
    @include('partials._hero')

    @auth
        @include('partials._user_statistics_info')
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


