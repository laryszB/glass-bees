<x-layout>
    @include('partials._hero')
    @include('partials._search')

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

{{--        @if(count($apiaries) == 0)--}}
{{--            "Nie masz żadnych pasiek"--}}
{{--        @endif--}}

        @foreach($apiaries as $apiary)
            <x-apiary-card :apiary="$apiary">
            </x-apiary-card>
        @endforeach

    </div>

    <div class="mt-6 p-4 flex justify-end">
        {{$apiaries->links()}}
    </div>
</x-layout>


