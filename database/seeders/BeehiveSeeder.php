<?php

namespace Database\Seeders;

use App\Models\Beehive;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeehiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $beehives = [
            [
                'apiary_id' => '1',
                'name' => 'ul 1',
                'description' => 'To jest ul numer 1',
                'type' => 'Wielkopolski',
                'bodies' => '1',
                'bottoms' => 'płaska',
                'extensions' => '2',
                'half_extensions' => '3',
                'frames' => '10',
                'note' => 'To jest krótka notatka'
            ]
        ];

        for ($i = 2; $i <= 8; $i++) {
            $frames = rand(5, 20);
            $bodies = rand(1, 3);
            $extensions = rand(1, 5);
            $half_extensions = rand(1, 5);


            $beehives[] = [
                'apiary_id' => '1',
                'name' => 'ul ' . $i,
                'description' => 'To jest ul numer ' . $i,
                'type' => 'Wielkopolski',
                'bodies' => $bodies,
                'bottoms' => 'płaska',
                'extensions' => $extensions,
                'half_extensions' => $half_extensions,
                'frames' => $frames,
                'note' => 'To jest krótka notatka'
            ];
        }


        foreach ($beehives as $beehive) {
            Beehive::create($beehive);
        }
    }
}
