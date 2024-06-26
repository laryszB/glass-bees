<div class="flex justify-center">
    <div class="lg:p-4 px-8 pb-4 pt-2 rounded mx-4 mb-4 bg-yellow-200 w-full items-center">
        <ul class="flex flex-col lg:flex-row space-y-2">
            <li
                class="flex items-center justify-center text-white py-1 px-4 mr-2"
            >
                <p class="text-xl text-black font-bold uppercase tracking-widest">Twoje statystyki:
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
                    <span class="font-bold text-yellow-200">{{ $beehives->count() }}</span>
                    <i class="fa-brands fa-hive" style="color: #fef08a;"></i>
                </p>
            </li>
            <li
                class="flex items-center justify-center bg-violet-400 text-white rounded-xl py-1 px-3 mr-2"
            >
                <p class="text-lg">Liczba posiadanych ramek:
                    <span class="font-bold text-yellow-200">{{ $totalFrames }}</span>
                    <i class="fa-solid fa-table-cells-large fa-sm" style="color: #fef08a;"></i>
                </p>
            </li>
        </ul>
    </div>
</div>
