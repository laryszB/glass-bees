<div x-data="{ open: false }" class="relative">
    <button
        @click="open = !open"
        class="bg-amber-300 text-gray-700 font-bold py-1 px-10 rounded inline-flex items-center hover:bg-amber-400"
    >
        <span class="mr-1">Wybierz akcję</span>
        <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
    </button>
    <ul
        x-show="open"
        x-cloak
        @click.away="open = false"
        class="absolute pt-1 z-20"
    >
        <li>
            <a
                class="rounded-t text-black bg-amber-100 hover:bg-amber-300 py-1 px-3 block whitespace-no-wrap font-medium"
                href="/apiaries/create"
            >
                    <i class="fa-solid fa-wheat-awn"></i> Utwórz pasiekę
            </a>
        </li>
        <li>
            <a
                class="rounded-t text-black bg-amber-100 hover:bg-amber-300 py-1 px-3 block whitespace-no-wrap font-medium"
                href="/apiaries/manage"
            >
                <i class="fa-solid fa-gear" style="color: black;"></i> Zarządzaj pasiekami
            </a>
        </li>
        <li>
            <a
                class="rounded-t text-black bg-amber-100 hover:bg-amber-300 py-1 px-3 block whitespace-no-wrap font-medium"
                href="/beehives/manage"
            >
                <i class="fa-brands fa-hive" style="color: black;"></i> Zarządzaj ulami
            </a>
        </li>
        <li>
            <a
                class="rounded-t text-black bg-amber-100 hover:bg-amber-300 py-1 px-3 block whitespace-no-wrap font-medium"
                href="{{route('feedings_create')}}"
            >
                <i class="fa-solid fa-utensils"></i> Karmienie pszczół
            </a>
        </li>
        <li>
            <a
                class="rounded-t text-black bg-amber-100 hover:bg-amber-300 py-1 px-3 block whitespace-no-wrap font-medium"
                href="{{route('feedings_list')}}"
            >
                <i class="fa-solid fa-utensils"></i> Rejestr karmień
            </a>
        </li>
        <li>
            <a
                class="rounded-t text-black bg-amber-100 hover:bg-amber-300 py-1 px-3 block whitespace-no-wrap font-medium"
                href="{{route('diseasescases_create')}}"
            >
                <i class="fa-solid fa-syringe"></i> Choroby pszczół
            </a>
        </li>
        <li>
            <a
                class="rounded-t text-black bg-amber-100 hover:bg-amber-300 py-1 px-3 block whitespace-no-wrap font-medium"
                href="{{route('diseasescases_index')}}"
            >
                <i class="fa-solid fa-syringe"></i> Rejestr chorób
            </a>
        </li>
    </ul>
</div>
