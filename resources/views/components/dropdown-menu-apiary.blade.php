<div x-data="{ open: false }" class="relative">
    <button
        @click="open = !open"
        class="bg-amber-300 text-black font-bold py-1 px-16 rounded inline-flex items-center hover:bg-amber-400"
    >
        <span class="mr-1">Pasieka</span>
        <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
    </button>
    <ul
        x-show="open"
        x-cloak
        @click.away="open = false"
        class="absolute pt-1 z-20 w-full text-black"
    >
        <li>
            <a
                class="bg-amber-100 hover:bg-amber-300 py-1 px-3 block whitespace-no-wrap font-medium"
                href="{{route('apiaries_create')}}"
            >
                    <i class="fa-solid fa-wheat-awn"></i> Utwórz pasiekę
            </a>
        </li>
        <li>
            <a
                class="bg-amber-100 hover:bg-amber-300 py-1 px-3 block whitespace-no-wrap font-medium"
                href="{{route('apiaries_manage')}}"
            >
                <i class="fa-solid fa-gear"></i> Zarządzaj pasiekami
            </a>
        </li>
        <li>
            <a
                class="bg-amber-100 hover:bg-amber-300 py-1 px-3 block whitespace-no-wrap font-medium"
                href="{{route('beehives_manage')}}"
            >
                <i class="fa-brands fa-hive"></i> Zarządzaj ulami
            </a>
        </li>
        <li>
            <a
                class="bg-amber-100 hover:bg-amber-300 py-1 px-3 block whitespace-no-wrap font-medium"
                href="{{route('inspections_index')}}"
            >
                <i class="fa-solid fa-clipboard-check"></i> Przegląd
            </a>
        </li>
    </ul>
</div>
