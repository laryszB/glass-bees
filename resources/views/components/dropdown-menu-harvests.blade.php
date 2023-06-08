<div x-data="{ open: false }" class="relative">
    <button
        @click="open = !open"
        class="bg-yellow-500 text-yellow-900 font-bold py-1 px-16 rounded inline-flex items-center hover:bg-yellow-400"
    >
        <span class="mr-1">Zbiory</span>
        <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
    </button>
    <ul
        x-show="open"
        x-cloak
        @click.away="open = false"
        class="absolute pt-1 z-20 w-full text-yellow-900"
    >
        <li>
            <a
                class="bg-amber-100 hover:bg-amber-300 py-1 px-3 block whitespace-no-wrap font-medium"
                href="{{route('honeyharvests_create')}}"
            >
                <i class="fa-solid fa-jar"></i> Zbiór miodu
            </a>
        </li>
        <li>
            <a
                class="bg-amber-100 hover:bg-amber-300 py-1 px-3 block whitespace-no-wrap font-medium"
                href="{{route('honeyharvests_index')}}"
            >
                <i class="fa-solid fa-jar"></i> Rejestr zbiorów miodu
            </a>
        </li>
    </ul>
</div>
