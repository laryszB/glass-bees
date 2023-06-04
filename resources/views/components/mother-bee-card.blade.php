@props(['apiary', 'beehive'])

@if($beehive->motherBee)

    <h3 class="text-3xl text-white font-bold mb-4 italic">
        Matka pszczela <i class="fa-solid fa-crown"></i>
    </h3>
    <div class="text-lg space-y-2 mt-4 text-yellow-400 bg-gray-900 py-4 px-8 rounded-lg w-96 break-words"
         x-data="{
                                        birthYear: {{ date('Y', strtotime($beehive->motherBee->birth_date)) }},
                                        maxLifeSpan: 5 * 365, // 5 lat
                                        beeColor() {
                                            switch (this.birthYear % 5) {
                                                case 0: return 'text-blue-500';
                                                case 1: return 'text-white';
                                                case 2: return 'text-yellow-500';
                                                case 3: return 'text-red-500';
                                                case 4: return 'text-green-500';
                                            }
                                        },
                                        beeLifeSpan() {
                                            const birthDate = new Date('{{ $beehive->motherBee->birth_date }}');
                                            const lifeSpan = Math.floor((new Date() - birthDate) / (1000 * 60 * 60 * 24));
                                            const lifeLeftPercentage = 100 - ((lifeSpan / this.maxLifeSpan) * 100);

                                            return lifeLeftPercentage > 0 ? lifeLeftPercentage : 0;
                                        }
                                    }">
        <p class="font-bold text-xl">PASEK ŻYCIA <i class="fa-solid fa-heart"></i></p>
        <div class="w-full h-6 bg-gray-600 relative mb-4 rounded-lg">
            <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center">
                <span class="text-md font-semibold text-white" x-text="`${Math.round(beeLifeSpan())}%`"></span>
            </div>
            <div :class="{
                'bg-green-500': beeLifeSpan() > 69,
                'bg-yellow-500': beeLifeSpan() <= 69 && beeLifeSpan() > 34,
                'bg-red-500': beeLifeSpan() <= 34
             }" :style="`width: ${beeLifeSpan()}%`" class="h-full transition-all duration-500 rounded-lg"></div>
        </div>

        <p><span class="font-bold">Rasa: </span> {{ $beehive->motherBee->race }}</p>
        <p><span class="font-bold">Linia: </span>{{ $beehive->motherBee->line }}</p>
        <p><span
                class="font-bold">Data urodzenia: </span> {{ date('d-m-Y', strtotime($beehive->motherBee->birth_date)) }}
            <i data-tippy-content="Kolor opalitka na matce pszczelej" class="fa-solid fa-circle"
               :class="beeColor()"></i></p>
        <p><span
                class="font-bold">Data umieszczenia: </span> {{ date('d-m-Y', strtotime($beehive->motherBee->placement_date)) }}
        </p>
        <p><span class="font-bold">Stan: </span> {{ $beehive->motherBee->state }}</p>
        <p><span class="font-bold">Notatka: </span> {{ $beehive->motherBee->note }}</p>

    </div>

    <div class="text-lg space-y-2 mt-2 text-yellow-400 bg-gray-900 px-8 py-1 rounded-lg w-96 break-words font-bold">
        <a class="hover:text-yellow-200"
           href="{{route('motherbees_edit', ['apiary' => $apiary, 'beehive' => $beehive, 'motherBee' => $beehive->motherBee])}}"><i
                class="fa-solid fa-pencil"></i> Edytuj</a>
    </div>

@else
    <h3 class="text-3xl text-white font-bold mb-4 italic">
        Matka pszczela <i class="fa-solid fa-crown"></i>
    </h3>
    <p class="bg-gray-900 px-4 y-1 text-red-500 rounded-lg font-semibold">Nie masz do tego ula przypisanej matki
        pszczelej</p>
    <div class="text-lg mt-4">
        <a href="{{route('motherbees_create', ['apiary' => $apiary, 'beehive' => $beehive])}}"
           class="font-semibold text-yellow-400 bg-gray-900 rounded-lg py-1 px-4 hover:bg-gray-800 hover:text-yellow-300"><i
                class="fa-solid fa-plus"></i> Dodaj matkę pszczelą</a>
    </div>
@endif
