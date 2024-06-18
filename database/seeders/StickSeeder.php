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
            'name' => 'Afterhour',
            'price' => 10000.00,
            'description' => 'A hangout place with an industrial bar concept offering billiard table facilities and DJ music performances.',
            'stock' => 10, // Assuming default stock for illustration
            'mainpic' => 'https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//catalog-image/86/MTA-140404610/brd-44261_venom-carbon-jump-cue-raider-13-5mm-stick-bola-lompat-billiard-loncat-terjamin_full01-7f7a6878.jpg',
            'pic2' => 'AfterhourPic1.jpg',
            'pic3' => 'AfterhourPic2.jpg',
            'pic4' => 'AfterhourPic3.jpg'
        ]);

        DB::table('stick')->insert([
            'name' => 'Q Billiard',
            'price' => 85000.00,
            'description' => 'A relaxed, dimly lit bar offering several pool tables and the standard cocktails.',
            'stock' => 10, // Assuming default stock for illustration
            'mainpic' => 'https://img.lazcdn.com/g/p/5e583b77cd12739b9dca8f9d6ac42c11.jpg_720x720q80.jpg',
            'pic2' => 'QBilliardPic1.jpg',
            'pic3' => 'QBilliardPic2.jpg',
            'pic4' => 'QBilliardPic3.jpg'
        ]);

        DB::table('stick')->insert([
            'name' => 'Berlian Billiard & Cafe',
            'price' => 45000.00,
            'description' => 'A place to hang out to play billiards in South Jakarta, as well as providing snacks and various food menus at the caffe',
            'stock' => 10, // Assuming default stock for illustration
            'mainpic' => 'mainPicBerlian.jpg',
            'pic2' => 'BerlianPic1.jpg',
            'pic3' => 'BerlianPic2.jpg',
            'pic4' => 'BerlianPic3.jpg'
        ]);

        DB::table('stick')->insert([
            'name' => '911 Billiard Alam Sutera',
            'price' => 60000.00,
            'description' => 'hangout place to play billiards with dining and caffe facilities',
            'stock' => 10, // Assuming default stock for illustration
            'mainpic' => 'mainPic911.jpg',
            'pic2' => '911Pic1.jpg',
            'pic3' => '911Pic2.jpg',
            'pic4' => '911Pic3.jpg'
        ]);

        DB::table('stick')->insert([
            'name' => 'Kals Drive In',
            'price' => 50000.00,
            'description' => 'hangout place to play billiards with VIP rooms (karaoke, playstation, and billiard), dining and caffe facilities',
            'stock' => 10, // Assuming default stock for illustration
            'mainpic' => 'mainPicKals.jpg',
            'pic2' => 'KalsPic1.jpg',
            'pic3' => 'KalsPic2.jpg',
            'pic4' => 'KalsPic3.jpg'
        ]);

        DB::table('stick')->insert([
            'name' => 'Hexa Billiard',
            'price' => 50000.00,
            'description' => 'hangout place to play billiards with dining and caffe facilities',
            'stock' => 10, // Assuming default stock for illustration
            'mainpic' => 'mainPicHexa.jpg',
            'pic2' => 'HexaPic1.jpg',
            'pic3' => 'HexaPic2.jpg',
            'pic4' => 'HexaPic3.jpg'
        ]);

    }
}
