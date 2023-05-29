<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Apiary;
use App\Models\BeeDisease;
use App\Models\BeehiveAccessory;
use App\Models\Food;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123')
        ]);

        Apiary::factory(1)->create([
            'user_id' => $user->id
        ]);

        $this->call(FloraSeeder::class);
        $this->call(BeehiveSeeder::class);
        $this->call(FoodSeeder::class);
        $this->call(BeeDiseaseSeeder::class);
        $this->call(BeehiveAccessorySeeder::class);
    }
}
