<?php

namespace Database\Seeders;

use App\Models\BeehiveAccessory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeehiveAccessorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $beehiveAccessories = [
            [
                'name' => 'Podkarmiaczka',
                'description' => 'Narzędzie służące do karmienia pszczół, kiedy nie ma wystarczającej ilości pożytku naturalnego. Podkarmiaczki mogą być montowane na górze, na dole lub z boku ula i są zazwyczaj napełniane roztworem cukru.',
            ],
            [
                'name' => 'Poławiacz pyłku',
                'description' => 'Urządzenie umieszczone przy wejściu do ula, które zbiera pyłek z nóg pszczół, gdy wracają one do ula. Pyłek jest następnie zbierany i może być używany do produkcji produktów pszczelarskich lub badania rodzajów kwiatów, które pszczoły odwiedzają.',
            ],
            [
                'name' => 'Klatka na matkę',
                'description' => 'Małe urządzenie, które służy do izolacji królowej od reszty kolonii. Może być używana do ochrony królowej podczas transportu, podczas wprowadzania nowej królowej do kolonii lub do utrzymania królowej z dala od plastrów podczas zbioru miodu.',
            ],
            [
                'name' => 'Krata odgrodowa',
                'description' => 'Siatka o określonym rozmiarze otworów, która pozwala pszczołom robotnicom przechodzić, ale blokuje dostęp królowej. Jest to przydatne narzędzie, które pozwala pszczelarzowi kontrolować, gdzie królowa może składać jaja.',
            ],
            [
                'name' => 'Izolator',
                'description' => 'Izolatory są używane do oddzielania różnych części ula. Mogą być używane do izolowania nowych kolonii, oddzielania pszczół chorobowych lub kontrolowania temperatury i wilgotności w ula.',
            ],
            [
                'name' => 'Balkonik',
                'description' => 'Deseczka lądowania, to płaska powierzchnia znajdująca się na wejściu do ula, która ułatwia pszczół wracających do ula lądowanie z pełnym ładunkiem nektaru lub pyłku.',
            ],
            [
                'name' => 'Rojołapka',
                'description' => 'Specjalne urządzenie, które pomaga w łapaniu rojów pszczół. Jest to zazwyczaj pudełko z wejściem, które przyciąga pszczelą królową i w konsekwencji cały rój.',
            ],
            [
                'name' => 'Podgrzewacz',
                'description' => 'Podgrzewacze są używane do kontrolowania temperatury w ulu, szczególnie w chłodniejszych miesiącach. Mogą to być elektryczne podgrzewacze maty, kable grzewcze lub podgrzewacze wodne.',
            ],
            [
                'name' => 'Mata',
                'description' => 'Mata pszczelarska, znana również jako mata izolacyjna, to pokrywa, która jest umieszczana na górze ram, aby zapobiec tworzeniu się kondensacji na plastrach. Pomaga również w utrzymaniu ciepła w ulu podczas zimniejszych miesięcy.',
            ]
        ];

        foreach ($beehiveAccessories as $beehiveAccessory) {
            BeehiveAccessory::create($beehiveAccessory);
        }
    }
}
