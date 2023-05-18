<x-layout>

    <a href="/" class="inline-block text-black ml-4 mb-4"
    ><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card>
            <div
                class="flex flex-col items-center justify-center text-center"
            >
                <h3 class="text-2xl">
                    <div class="rounded px-6 py-1 mb-2 text-center w-fit text-amber-500">
                        <span class="font-semibold">{{$beehive->name}}</span>
                        <i class="fa-solid fa-wheat-awn"></i>
                    </div>
                    </a>
                </h3>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Opis pasieki
                    </h3>
                    <div class="text-lg space-y-6">
                        {{$beehive->description}}
                    </div>
                </div>
                <div class="border border-gray-200 w-full mb-6 mt-4"></div>
            </div>
        </x-card>

    </div>

</x-layout>
