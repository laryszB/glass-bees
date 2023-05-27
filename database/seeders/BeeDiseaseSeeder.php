<?php

namespace Database\Seeders;

use App\Models\BeeDisease;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeeDiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $beeDiseases = [
            [
                'name' => 'Warroza',
                'symptoms' => 'Obecność pasożytniczych roztoczy Varroa destructor, zniekształcenia skrzydeł i brzuchów pszczół, obecność pasożytów na ciele pszczół.',
                'treatment' => 'Kwas mrówkowy, kwas szczawiowy, thymol, olejek eukaliptusowy, fluwialinat.',
            ],
            [
                'name' => 'Nosemoza',
                'symptoms' => 'Biegunka, spadek wydajności pszczół, osłabienie całych rodzin pszczelich, skrócenie trwania życia.',
                'treatment' => 'Fumagilina.',
            ],
            [
                'name' => 'Zgnilec amerykański',
                'symptoms' => 'Ropne zapalenie larw pszczół, zniekształcone larwy, zniszczenie rodzin pszczelich.',
                'treatment' => 'Spalenie zarażonych uli, dezynfekcja sprzętu.',
            ],
            [
                'name' => 'Zgnilec europejski',
                'symptoms' => 'Żółtawo-brązowe ropne zapalenie larw pszczół, osłabienie rodzin pszczelich.',
                'treatment' => 'Odstrzał zarażonych rodzin pszczelich.',
            ],
            [
                'name' => 'Lożysko pszczół',
                'symptoms' => 'Białawe, kruche larwy pszczół, obecność grzybni w komórkach.',
                'treatment' => 'Tetracyklina, fumagilina.',
            ],
            [
                'name' => 'Nosaczek pszczeli',
                'symptoms' => 'Drgawki, osłabienie, niezdolność do lotu, wypadanie owłosienia.',
                'treatment' => 'Brak specyficznego leczenia, utrzymanie silnych i zdrowych rodzin pszczelich.',
            ],
            [
                'name' => 'Zgnilizna przechowalnicza',
                'symptoms' => 'Zgnilizna miodu, skrzepy grzybni na plastrach, nieprzyjemny zapach.',
                'treatment' => 'Zapewnienie odpowiedniej wentylacji i wilgotności w pasiekach, przechowywanie miodu w odpowiednich warunkach.',
            ],
            [
                'name' => 'Paśnik pszczeli',
                'symptoms' => 'Zamienienie larw pszczół w twarde, kamieniste struktury.',
                'treatment' => 'Usuwanie zarażonych larw, utrzymanie higieny w pasiekach.',
            ],
            [
                'name' => 'Krztusiec pszczeli',
                'symptoms' => 'Biegunka, plamy odchodowe na przedniej części ulu, spadek wydajności rodzin pszczelich.',
                'treatment' => 'Zapewnienie czystości w pasiekach, dostarczanie odpowiedniego pożywienia.',
            ],
            [
                'name' => 'Moher pszczeli',
                'symptoms' => 'Wypadanie owłosienia pszczół, szczególnie na tułowiu i odwłoku.',
                'treatment' => 'Brak specyficznego leczenia, utrzymanie higieny w pasiekach, zapobieganie rozprzestrzenianiu się pasożytów.',
            ],
        ];



        foreach ($beeDiseases as $beeDisease) {
            BeeDisease::create($beeDisease);
        }
    }
}
