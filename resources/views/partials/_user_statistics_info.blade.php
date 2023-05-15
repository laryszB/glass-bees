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
                <i class="fa-solid fa-wheat-awn" style="color: #fef08a;"></i>
            </p>
        </li>
        <li
            class="flex items-center justify-center bg-violet-400 text-white rounded-xl py-1 px-3 mr-2"
        >
            <p class="text-lg">Liczba posiadanych uli:
                <span class="font-bold text-yellow-200">50x</span>
                <i class="fa-brands fa-hive" style="color: #fef08a;"></i>
            </p>
        </li>
        <li
            class="flex items-center justify-center bg-violet-400 text-white rounded-xl py-1 px-3 mr-2"
        >
            <p class="text-lg">Liczba ramek:
                <span class="font-bold text-yellow-200">50y</span>
                <i class="fa-solid fa-table-cells-large fa-sm" style="color: #fef08a;"></i>
            </p>
        </li>
    </ul>
</x-card>