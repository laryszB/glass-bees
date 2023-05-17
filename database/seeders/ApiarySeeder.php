<?php

namespace Database\Seeders;

use App\Models\Apiary;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apiaries = [
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


        foreach ($apiaries as $apiary) {
            Apiary::create($apiary);
        }
    }
}
