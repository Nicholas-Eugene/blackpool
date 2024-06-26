<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(TableSeeder::class);
        $this->call(CartSeeder::class);
        $this->call(HistorySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(StickSeeder::class);
        $this->call(FoodAndBeverageSeeder::class);
    }
}
