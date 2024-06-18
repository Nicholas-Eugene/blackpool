<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodAndBeverageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('foodandbeverage')->insert([
            'name' => 'Cheeseburger',
            'price' => 50000.00,
            'description' => 'A delicious cheeseburger with fresh lettuce, tomato, and a special sauce.',
            'stock' => 20, // Assuming default stock for illustration
            'mainpic' => 'cheeseburger_main.jpg',
            'pic2' => 'cheeseburger_1.jpg',
            'pic3' => 'cheeseburger_2.jpg',
            'pic4' => 'cheeseburger_3.jpg',
            'type' => 'food'  // Setting type to food
        ]);

        DB::table('foodandbeverage')->insert([
            'name' => 'Veggie Pizza',
            'price' => 75000.00,
            'description' => 'A vegetarian pizza topped with fresh vegetables and mozzarella cheese.',
            'stock' => 15, // Assuming default stock for illustration
            'mainpic' => 'veggie_pizza_main.jpg',
            'pic2' => 'veggie_pizza_1.jpg',
            'pic3' => 'veggie_pizza_2.jpg',
            'pic4' => 'veggie_pizza_3.jpg',
            'type' => 'food'  // Setting type to food
        ]);

        DB::table('foodandbeverage')->insert([
            'name' => 'Chocolate Milkshake',
            'price' => 30000.00,
            'description' => 'A creamy chocolate milkshake topped with whipped cream and chocolate shavings.',
            'stock' => 25, // Assuming default stock for illustration
            'mainpic' => 'chocolate_milkshake_main.jpg',
            'pic2' => 'chocolate_milkshake_1.jpg',
            'pic3' => 'chocolate_milkshake_2.jpg',
            'pic4' => 'chocolate_milkshake_3.jpg',
            'type' => 'drinks'  // Setting type to drinks
        ]);

        DB::table('foodandbeverage')->insert([
            'name' => 'Lemonade',
            'price' => 20000.00,
            'description' => 'A refreshing lemonade made with freshly squeezed lemons.',
            'stock' => 30, // Assuming default stock for illustration
            'mainpic' => 'lemonade_main.jpg',
            'pic2' => 'lemonade_1.jpg',
            'pic3' => 'lemonade_2.jpg',
            'pic4' => 'lemonade_3.jpg',
            'type' => 'drinks'  // Setting type to drinks
        ]);

        DB::table('foodandbeverage')->insert([
            'name' => 'Grilled Chicken Sandwich',
            'price' => 55000.00,
            'description' => 'A grilled chicken sandwich with lettuce, tomato, and mayo on a toasted bun.',
            'stock' => 10, // Assuming default stock for illustration
            'mainpic' => 'grilled_chicken_sandwich_main.jpg',
            'pic2' => 'grilled_chicken_sandwich_1.jpg',
            'pic3' => 'grilled_chicken_sandwich_2.jpg',
            'pic4' => 'grilled_chicken_sandwich_3.jpg',
            'type' => 'food'  // Setting type to food
        ]);

        DB::table('foodandbeverage')->insert([
            'name' => 'Cappuccino',
            'price' => 40000.00,
            'description' => 'A classic cappuccino with steamed milk and a rich espresso shot.',
            'stock' => 20, // Assuming default stock for illustration
            'mainpic' => 'cappuccino_main.jpg',
            'pic2' => 'cappuccino_1.jpg',
            'pic3' => 'cappuccino_2.jpg',
            'pic4' => 'cappuccino_3.jpg',
            'type' => 'drinks'  // Setting type to drinks
        ]);
    }
}
