<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $foods = [
            [
                'name' => 'Pyłek kwiatowy',
                'description' => 'Pyłek kwiatowy jest zbieranym przez pszczoły pyłem roślinnym. Stanowi ważne źródło białka i składników odżywczych dla pszczół.',
            ],
            [
                'name' => 'Nektar',
                'description' => 'Nektar jest słodkim płynem, który jest produkowany przez kwiaty. To główne źródło energii dla pszczół, z którego produkowany jest miód.',
            ],
            [
                'name' => 'Miód',
                'description' => 'Miód to słodki produkt, który pszczółki wytwarzają z nektaru kwiatowego. Jest to ich główne źródło pokarmu oraz składnik wielu innych produktów spożywczych.',
            ],
            [
                'name' => 'Propolis',
                'description' => 'Propolis jest substancją żywiczną zbieraną przez pszczoły z pąków drzewnych. Jest wykorzystywany jako materiał budowlany oraz ma działanie antybakteryjne i lecznicze.',
            ],
            [
                'name' => 'Pyłek kwiatowy suszony',
                'description' => 'Suszony pyłek kwiatowy jest cennym źródłem składników odżywczych i witamin dla pszczół. Może być stosowany jako suplement diety dla pszczół.',
            ],
            [
                'name' => 'Syrop cukrowy',
                'description' => 'Syrop cukrowy to sztuczny pokarm, który można podawać pszczelom jako alternatywę dla naturalnych źródeł nektaru w okresach niedoboru pokarmu.',
            ],
            [
                'name' => 'Pasty białkowe',
                'description' => 'Pasty białkowe to specjalne preparaty bogate w białko, które mogą być stosowane jako uzupełnienie diety pszczół, szczególnie w okresach intensywnego rozwoju populacji.',
            ],
            [
                'name' => 'Pyłek kwiatowy fermentowany',
                'description' => 'Fermentowany pyłek kwiatowy to bogate źródło składników odżywczych dla pszczół. Proces fermentacji ułatwia przyswajanie składników odżywczych przez pszczoły.',
            ],
            [
                'name' => 'Cukier puder',
                'description' => 'Cukier puder jest jednym z rodzajów pokarmu dostarczanego pszczółkom. Może być stosowany jako dodatkowe źródło energii w okresach niedoboru nektaru.',
            ],
            [
                'name' => 'Proszek pyłkowy',
                'description' => 'Proszek pyłkowy to suszony i sproszkowany pyłek kwiatowy, który można podawać pszczółkom jako uzupełnienie diety. Jest bogaty w składniki odżywcze, witaminy i minerały.',
            ],
            [
                'name' => 'Woda cukrowa',
                'description' => 'Woda cukrowa to mieszanina cukru rozpuszczonego w wodzie, która może być podawana pszczółkom jako źródło energii w okresach niedoboru nektaru.',
            ],
            [    'name' => 'Mleczko pszczele',
                'description' => 'Mleczko pszczele to wydzielina gruczołów pokarmowych pszczół matek. Stanowi cenne źródło składników odżywczych dla pszczół w pierwszych dniach ich życia.',
            ]
        ];


        foreach ($foods as $food) {
            Food::create($food);
        }
    }
}
