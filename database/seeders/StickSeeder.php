<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StickSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stick')->insert([
            'name' => 'Predator Air Rush',
            'price' => 10000.00,
            'description' => 'Introducing the Predator Air Rush jump cue with Air REVO carbon fiber composite shaft. ',
            'stock' => 10,
            'mainpic' => 'storage/img/predator.jpg',
            'pic2' => 'AfterhourPic1.jpg',
            'pic3' => 'AfterhourPic2.jpg',
            'pic4' => 'AfterhourPic3.jpg'
        ]);

        DB::table('stick')->insert([
            'name' => 'Fury Tempest AF Series AF-1',
            'price' => 85000.00,
            'description' => 'Fury Tempest cue series presents an unbeatable price-performance ratio whilst not compromising design and quality.',
            'stock' => 10, // Assuming default stock for illustration
            'mainpic' => 'storage/img/fury.png',
            'pic2' => 'QBilliardPic1.jpg',
            'pic3' => 'QBilliardPic2.jpg',
            'pic4' => 'QBilliardPic3.jpg'
        ]);

        DB::table('stick')->insert([
            'name' => 'Predator P3 Emerald Green Revo',
            'price' => 45000.00,
            'description' => 'Featuring a Metallic Green finish with Black Gloss Stripe, 30-piece construction, and the Uni-Loc© Weight Cartridge system.',
            'stock' => 10, // Assuming default stock for illustration
            'mainpic' => 'storage/img/revo.jpg',
            'pic2' => 'BerlianPic1.jpg',
            'pic3' => 'BerlianPic2.jpg',
            'pic4' => 'BerlianPic3.jpg'
        ]);

        DB::table('stick')->insert([
            'name' => 'CueMall Valor Model F',
            'price' => 60000.00,
            'description' => 'CueMall Valor series is the newest innovation in Carbon Cue. Shaft made with Carbon Fibre and bold decal designs.',
            'stock' => 10, // Assuming default stock for illustration
            'mainpic' => 'storage/img/cuemall.jpg',
            'pic2' => '911Pic1.jpg',
            'pic3' => '911Pic2.jpg',
            'pic4' => '911Pic3.jpg'
        ]);

        DB::table('stick')->insert([
            'name' => 'Scorpion Trojan TR-06',
            'price' => 50000.00,
            'description' => 'Scorpion Trojan series is the newest innovation Carbon Cue. Shaft made with Real Carbon, and with bold designs with water transfer imaging technology.',
            'stock' => 10, // Assuming default stock for illustration
            'mainpic' => 'storage/img/scorpion.jpg',
            'pic2' => 'KalsPic1.jpg',
            'pic3' => 'KalsPic2.jpg',
            'pic4' => 'KalsPic3.jpg'
        ]);

        DB::table('stick')->insert([
            'name' => 'Predator SP8 Curly/Heart LL',
            'price' => 50000.00,
            'description' => 'Predator 8-Point Sneaky Pete Pool Cue - Purple Heart/Curly - Elephant Pattern Leather Wrap.',
            'stock' => 10, // Assuming default stock for illustration
            'mainpic' => 'storage/img/predator2.jpg',
            'pic2' => 'HexaPic1.jpg',
            'pic3' => 'HexaPic2.jpg',
            'pic4' => 'HexaPic3.jpg'
        ]);

    }
}
