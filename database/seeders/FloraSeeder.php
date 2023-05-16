<?php

namespace Database\Seeders;

use App\Models\Flora;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FloraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $floras = [
            [
                'name' => 'Rzepak',

                'description' => 'Rzepak jest rośliną uprawną, która ma duże znaczenie dla pszczół i pszczelarstwa.
                 Jego kwiaty wytwarzają obfity nektar i pyłek, przyciągając pszczoły, które zapylają roślinę i produkcja miodu na bazie nektaru z rzepaku jest popularna w pszczelarstwie.',

                'flowering_period_start' => 'kwiecień',

                'flowering_period_end' => 'maj',
            ],

            [
                'name' => 'Nawłoć',
                'description' => 'Nawłoć jest rośliną zielną, której kwiaty wytwarzają nektar, stanowiący cenne źródło pokarmu dla pszczół.
                 Pszczoły chętnie odwiedzają kwiaty nawłoci, a miód produkowany na bazie nektaru z tej rośliny jest ceniony ze względu na swoje właściwości lecznicze.',
                'flowering_period_start' => 'czerwiec',
                'flowering_period_end' => 'lipiec',
            ],

            [
                'name' => 'Spadź liściasta',
                'description' => 'Spadź liściasta to drzewo, które jest cennym źródłem pyłku dla pszczół.
                 Kwiaty spadzi liściastej dostarczają nektar i pyłek, które pszczoły gromadzą jako pokarm dla swojego gatunku.
                 Spadź liściasta może służyć również jako źródło surowca dla pszczelarzy w produkcji miodu.',
                'flowering_period_start' => 'marzec',
                'flowering_period_end' => 'kwiecień',
            ],


            [
                'name' => 'Spadź iglasta',
                'description' => 'Spadź iglasta to inny rodzaj drzewa, które ma znaczenie dla pszczół i pszczelarstwa.
                 Choć iglaki zazwyczaj nie wytwarzają nektaru, to ich pyłek jest cennym źródłem białka dla pszczół.
                  Pszczoły zbierają pyłek z kwiatów iglaków i wykorzystują go w produkcji pokarmu dla swojego gatunku.',
                'flowering_period_start' => 'kwiecień',
                'flowering_period_end' => 'maj',
            ],


            [
                'name' => 'Akacja',
                'description' => 'Akacja jest rośliną, która jest znana ze swojego obfitego kwitnienia i wytwarzania nektaru.
                 Jej kwiaty są atrakcyjne dla pszczół i przyciągają duże ilości owadów zapylających.
                 Nektar z akacji jest często wykorzystywany w pszczelarstwie do produkcji specjalnego gatunku miodu o delikatnym smaku i jasnej barwie.',
                'flowering_period_start' => 'maj',
                'flowering_period_end' => 'czerwiec',
            ],


            [
                'name' => 'Lipa',
                'description' => 'Lipa jest jednym z najważniejszych gatunków roślin dla pszczół i pszczelarstwa.
                 Jej kwiaty wytwarzają obfity nektar o intensywnym zapachu, który przyciąga pszczoły i inne owady zapylające.
                 Nektar z lipy jest wykorzystywany w produkcji miodu lipowego, który jest ceniony za swój delikatny smak i właściwości lecznicze.',
                'flowering_period_start' => 'czerwiec',
                'flowering_period_end' => 'lipiec',
            ],


            [
                'name' => 'Malina',
                'description' => 'Malina jest rośliną owocową, której kwiaty są atrakcyjne dla pszczół.
                 Pszczoły zapylają kwiaty malin, co przyczynia się do zwiększenia plonów i jakości owoców.
                 Malina jest również ważnym źródłem nektaru i pyłku dla pszczół, a miód malinowy cieszy się popularnością wśród pszczelarzy.',
                'flowering_period_start' => 'maj',
                'flowering_period_end' => 'czerwiec',
            ],


            [
                'name' => 'Gryka',
                'description' => 'Gryka jest rośliną, której kwiaty wytwarzają obfity nektar i pyłek.
                 Pszczoły odwiedzają kwiaty gryki, zbierając nektar do produkcji miodu.
                 Miód gryczany ma charakterystyczny smak i jest ceniony za swoje zdrowotne właściwości, takie jak obniżanie ciśnienia krwi.',
                'flowering_period_start' => 'lipiec',
                'flowering_period_end' => 'sierpień',
            ],


            [
                'name' => 'Wrzos',
                'description' => 'Wrzos to roślina charakterystyczna dla obszarów o klimacie umiarkowanym.
                 Kwitnie w późnym lecie i wczesnej jesieni, dostarczając pszczołom nektar i pyłek w okresie, gdy inne rośliny już przestały kwitnąć.
                 Wrzos jest ważnym źródłem pożytku dla pszczół pod koniec sezonu i może być wykorzystywany do produkcji specjalnego miodu wrzosowego.',
                'flowering_period_start' => 'sierpień',
                'flowering_period_end' => 'wrzesień',
            ],


            [
                'name' => 'Facelia',
                'description' => 'Facelia jest popularną rośliną pożytkową w pszczelarstwie.
                 Jej niebieskie kwiaty przyciągają pszczoły i dostarczają im obfitego nektaru oraz pyłku.
                 Facelia jest często uprawiana jako roślina nawadniająca, która poprawia strukturę gleby i dostarcza pszczelom wartościowych źródeł pożytku.',
                'flowering_period_start' => 'czerwiec',
                'flowering_period_end' => 'lipiec',
            ],


            [
                'name' => 'Nostrzyk',
                'description' => 'Nostrzyk, znany również jako koniczyna, jest rośliną, która jest bogatym źródłem nektaru dla pszczół.
                 Jego charakterystyczne kuliste kwiatostany są popularnym celem pszczół, które zbierają nektar i pyłek.
                 Nektar z nostrzyka jest wykorzystywany do produkcji miodu koniczynowego, który ma łagodny smak i jasną barwę.',
                'flowering_period_start' => 'czerwiec',
                'flowering_period_end' => 'lipiec',
            ],


            [
                'name' => 'Róża',
                'description' => 'Róża jest rośliną ozdobną i uprawną, której kwiaty są atrakcyjne dla pszczół. Różne gatunki i odmiany róż wytwarzają nektar, który stanowi cenny pokarm dla pszczół.
                 Pszczoły zapylają kwiaty róż, przyczyniając się do rozwoju różnych odmian i krzyżówek tego pięknego kwiatu.
                 Nektar z róż jest wykorzystywany przez pszczelarzy do produkcji miodu różanego, który charakteryzuje się delikatnym aromatem i łagodnym smakiem.
                 Róże są także ważnym źródłem pyłku, który jest niezbędny dla rozwoju pszczół i ich larw.',
                'flowering_period_start' => 'czerwiec',
                'flowering_period_end' => 'lipiec',
            ],

        ];

        foreach ($floras as $flora) {
            Flora::create($flora);
        }
    }
}
