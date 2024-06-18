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
            'name' => 'Nasi goreng Ayam',
            'price' => 50000.00,
            'description' => 'Nasi goreng klasik dengan ayam, telur, dan bumbu khas Indonesia.',
            'stock' => 20, // Assuming default stock for illustration
            'mainpic' => 'storage/img/nasgor.jpg',
            'pic2' => 'cheeseburger_1.jpg',
            'pic3' => 'cheeseburger_2.jpg',
            'pic4' => 'cheeseburger_3.jpg',
            'type' => 'food'  // Setting type to food
        ]);

        DB::table('foodandbeverage')->insert([
            'name' => 'Nasi ayam rica rica',
            'price' => 75000.00,
            'description' => 'Nasi dengan ayam dimasak pedas dengan bumbu rica-rica khas Manado.',
            'stock' => 15, // Assuming default stock for illustration
            'mainpic' => 'storage/img/rica.jpg',
            'pic2' => 'veggie_pizza_1.jpg',
            'pic3' => 'veggie_pizza_2.jpg',
            'pic4' => 'veggie_pizza_3.jpg',
            'type' => 'food'  // Setting type to food
        ]);

        DB::table('foodandbeverage')->insert([
            'name' => 'Nasi Beef Yakiniku',
            'price' => 30000.00,
            'description' => 'Nasi dengan irisan daging sapi panggang ala Jepang dengan saus yakiniku.',
            'stock' => 25, // Assuming default stock for illustration
            'mainpic' => 'storage/img/beef.jpg',
            'pic2' => 'chocolate_milkshake_1.jpg',
            'pic3' => 'chocolate_milkshake_2.jpg',
            'pic4' => 'chocolate_milkshake_3.jpg',
            'type' => 'drinks'  // Setting type to drinks
        ]);

        DB::table('foodandbeverage')->insert([
            'name' => 'Roti Bakar Coklat Keju',
            'price' => 20000.00,
            'description' => 'Roti bakar dengan olesan coklat dan keju leleh.',
            'stock' => 30, // Assuming default stock for illustration
            'mainpic' => 'storage/img/roti.jpeg',
            'pic2' => 'lemonade_1.jpg',
            'pic3' => 'lemonade_2.jpg',
            'pic4' => 'lemonade_3.jpg',
            'type' => 'drinks'  // Setting type to drinks
        ]);

        DB::table('foodandbeverage')->insert([
            'name' => 'Indomie Kuah Kari Ayam',
            'price' => 55000.00,
            'description' => 'Mie instan rebus dengan kuah kari ayam yang gurih.',
            'stock' => 10, // Assuming default stock for illustration
            'mainpic' => 'storage/img/indomi.jpg',
            'pic2' => 'grilled_chicken_sandwich_1.jpg',
            'pic3' => 'grilled_chicken_sandwich_2.jpg',
            'pic4' => 'grilled_chicken_sandwich_3.jpg',
            'type' => 'food'  // Setting type to food
        ]);

        DB::table('foodandbeverage')->insert([
            'name' => 'Lemonade Soda Punch',
            'price' => 40000.00,
            'description' => 'Minuman berkarbonasi segar dari air lemon dan gula.',
            'stock' => 20, // Assuming default stock for illustration
            'mainpic' => 'storage/img/lemonade.jpg',
            'pic2' => 'cappuccino_1.jpg',
            'pic3' => 'cappuccino_2.jpg',
            'pic4' => 'cappuccino_3.jpg',
            'type' => 'drinks'  // Setting type to drinks
        ]);
    }
}
