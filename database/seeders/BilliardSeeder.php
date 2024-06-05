<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BilliardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('billiard')->insert([
            'name' => 'Afterhour',
            'address' => 'Pasar Pantai Indah Kapuk, Kav. K 2, Unit FD, Jl. Pantai Indah Utara 2, RW.7, Kapuk Muara, Kec. Penjaringan, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14460',
            'rating' => 4.5,
            'totalrate' => 794,
            'priceperhour' => 100000,
            'description' => 'A hangout place with an industrial bar concept offering billiard table facilities and DJ music performances.',
            'openat' => 'Minggu s/d Senin (12.00 to 02.00), Jumat & Sabtu (12.00 to 03.00)',
            'telephone' => '(021) 30051613',
            'whatsapp' => '+62 818-1880-6988',
            'insta' => '@afterhour_pik',
            'mainpic' => 'mainPicAfterhour.jpg',
            'pic2' => 'AfterhourPic1.jpg',
            'pic3' => 'AfterhourPic2.jpg',
            'pic4' => 'AfterhourPic3.jpg'
        ]);

        DB::table('billiard')->insert([
            'name' => 'Q Billiard',
            'address' => 'Senayan City Crystal Lagoon B2,Jl. Asia Afrika No. 19, Jakarta, RT.1/RW.3, Gelora, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10270',
            'rating' => 4.4,
            'totalrate' => 271,
            'priceperhour' => 85000,
            'description' => 'A relaxed, dimly lit bar offering several pool tables and the standard cocktails.',
            'openat' => '10.00 - 22.00',
            'telephone' => '(021) 72781602',
            'whatsapp' => '+62 821-7800-0190',
            'insta' => '@qbilliardjkt',
            'mainpic' => 'mainPicQBilliard.jpg',
            'pic2' => 'QBilliardPic1.jpg',
            'pic3' => 'QBilliardPic2.jpg',
            'pic4' => 'QBilliardPic3.jpg'
        ]);

        DB::table('billiard')->insert([
            'name' => 'Berlian Billiard & Cafe',
            'address' => 'Jl. Warung Jati Barat No.23, RT.5/RW.5, Jati Padang, Ps. Minggu, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12540',
            'rating' => 4.3,
            'totalrate' => 280,
            'priceperhour' => 45000,
            'description' => 'A place to hang out to play billiards in South Jakarta, as well as providing snacks and various food menus at the caffe',
            'openat' => '14.00 - 02.00',
            'telephone' => '(021) 7970074',
            'whatsapp' => '-',
            'insta' => '@berlian_billiard',
            'mainpic' => 'mainPicBerlian.jpg',
            'pic2' => 'BerlianPic1.jpg',
            'pic3' => 'BerlianPic2.jpg',
            'pic4' => 'BerlianPic3.jpg'
        ]);

        DB::table('billiard')->insert([
            'name' => '911 Billiard Alam Sutera',
            'address' => 'Jl. Alam Sutera Boulevard No.16 C, Pakulonan, Kec. Serpong Utara, Kota Tangerang Selatan, Banten 15325',
            'rating' => 4.8,
            'totalrate' => 131,
            'priceperhour' => 60000,
            'description' => 'hangout place to play billiards with dining and caffe facilities',
            'openat' => '13.00 - 00.00',
            'telephone' => '+62 878-8309-1600',
            'whatsapp' => '-',
            'insta' => '@911.billiard',
            'mainpic' => 'mainPic911.jpg',
            'pic2' => '911Pic1.jpg',
            'pic3' => '911Pic2.jpg',
            'pic4' => '911Pic3.jpg'
        ]);

        DB::table('billiard')->insert([
            'name' => 'Kals Drive In',
            'address' => 'Ruko Alloggio Timur, Jl. Medang Lestari No.19, Medang, Pagedangan, Tangerang Regency, Banten 15334',
            'rating' => 4.7,
            'totalrate' => 81,
            'priceperhour' => 50000,
            'description' => 'hangout place to play billiards with VIP rooms (karaoke, playstation, and billiard), dining and caffe facilities',
            'openat' => '12.00 - 23.00',
            'telephone' => '+62 812-8790-6358',
            'whatsapp' => '+62 812-8790-6358',
            'insta' => '@kals_drive_in',
            'mainpic' => 'mainPicKals.jpg',
            'pic2' => 'KalsPic1.jpg',
            'pic3' => 'KalsPic2.jpg',
            'pic4' => 'KalsPic3.jpg'
        ]);

        DB::table('billiard')->insert([
            'name' => 'Hexa Billiard',
            'address' => 'Ruko Sorrento Place no 37, Jl. Ir Soekarno Gading Serpong, Curug Sangereng, Kec. Klp. Dua, Kabupaten Tangerang, Banten 15810',
            'rating' => 4.3,
            'totalrate' => 31,
            'priceperhour' => 50000,
            'description' => 'hangout place to play billiards with dining and caffe facilities',
            'openat' => '12.00 - 00.00',
            'telephone' => '+62 812-8208-8102',
            'whatsapp' => '+62 812-8208-8102',
            'insta' => '@hexabilliard',
            'mainpic' => 'mainPicHexa.jpg',
            'pic2' => 'HexaPic1.jpg',
            'pic3' => 'HexaPic2.jpg',
            'pic4' => 'HexaPic3.jpg'
        ]);

        DB::table('billiard')->insert([
            'name' => 'Kumpool',
            'address' => 'Jalan Suryakencana no 38 Bogor',
            'rating' => 4.7,
            'totalrate' => 49,
            'priceperhour' => 38500,
            'description' => 'hangout place to play billiards with dining and caffe facilities',
            'openat' => '12.00 - 01.00',
            'telephone' => '-',
            'whatsapp' => '(0857)10567491',
            'insta' => '@kumpool.billiard',
            'mainpic' => 'mainPicKumpool.png',
            'pic2' => 'KumpoolPic1.png',
            'pic3' => 'KumpoolPic2.png',
            'pic4' => 'KumpoolPic3.png'
        ]);

        DB::table('billiard')->insert([
            'name' => 'One Stix',
            'address' => 'Jl. A. Yani No.26, Tanah Sareal, Kec. Tanah Sereal, Kota Bogor, Jawa Barat 16161',
            'rating' => 4.9,
            'totalrate' => 69,
            'priceperhour' => 45000,
            'description' => 'hangout place to play billiards with dining and caffe facilities',
            'openat' => '12.30 - 01.30',
            'telephone' => '+62 818-558-787',
            'whatsapp' => '-',
            'insta' => '@onestixbogor',
            'mainpic' => 'mainPicOneStix.jpg',
            'pic2' => 'OneStixPic1.jpg',
            'pic3' => 'OneStixPic2.jpg',
            'pic4' => 'OneStixPic3.jpg'
        ]);

        DB::table('billiard')->insert([
            'name' => 'Nine Ball',
            'address' => 'no. 23 D, Jl. Sukasari 1 No.RT 06/02, Sukasari, Kec. Bogor Tim., Kota Bogor, Jawa Barat 16142',
            'rating' => 5,
            'totalrate' => 115,
            'priceperhour' => 45000,
            'description' => 'hangout place to play billiards with dining and caffe facilities',
            'openat' => 'Weekdays: 11.00 - 02.00, Weekend: 09.00 - 02.00',
            'telephone' => '+62 851-0177-6733',
            'whatsapp' => '+62 813-9693-1753',
            'insta' => '@nineball_billiard',
            'mainpic' => 'mainPicNineBall.jpg',
            'pic2' => 'NineBallPic1.jpg',
            'pic3' => 'NineBallPic2.jpg',
            'pic4' => 'NineBallPic3.jpg'
        ]);

        DB::table('billiard')->insert([
            'name' => 'New Canon',
            'address' => 'Jl. Margonda Raya No.37 (Sebrang ITC Depok) Depok,Jawa Barat,Indonesia',
            'rating' => 4.4,
            'totalrate' => 430,
            'priceperhour' => 50000,
            'description' => 'hangout place to play billiards',
            'openat' => '10.54 - 03.00',
            'telephone' => '(021) 77218749',
            'whatsapp' => '+62 822-9898-8881',
            'insta' => '@canon_billiard',
            'mainpic' => 'mainPicNewCanon.png',
            'pic2' => 'NewCanonPic1.png',
            'pic3' => 'NewCanonPic2.png',
            'pic4' => 'NewCanonPic3.png'
        ]);

        DB::table('billiard')->insert([
            'name' => 'Golden Stick Billiard',
            'address' => 'Jl. Akses UI No.26, Tugu, Kec. Cimanggis, Kota Depok, Jawa Barat 16451',
            'rating' => 4.3,
            'totalrate' => 1500,
            'priceperhour' => 32000,
            'description' => 'Lively game room with pool table, karaoke lounge & futsal & badminton courts.',
            'openat' => '10.00 - 01.00',
            'telephone' => '+62 812-9985-5559',
            'whatsapp' => '+62 812-9985-5559',
            'insta' => '@gscdepok',
            'mainpic' => 'mainPicGoldenStick.png',
            'pic2' => 'GoldenStickPic1.png',
            'pic3' => 'GoldenStickPic2.png',
            'pic4' => 'GoldenStickPic3.png'
        ]);

        DB::table('billiard')->insert([
            'name' => 'Tenggara Space',
            'address' => 'Jl. Ir. H. Juanda Jl. Kp. Sugutamu, RT.007/RW.021, Bakti Jaya, Kec. Sukmajaya, Kota Depok, Jawa Barat 16412',
            'rating' => 4.9,
            'totalrate' => 16,
            'priceperhour' => 30000,
            'description' => 'Multispace  with cafe, barbershop, billiard',
            'openat' => 'Weekday: 12.00 - 00.00',
            'telephone' => '+62 838-4556-2480',
            'whatsapp' => '+62 838-4556-2480',
            'insta' => '@tenggaraspace',
            'mainpic' => 'mainPicTenggaraSpace.png',
            'pic2' => 'TenggaraSpacePic1.png',
            'pic3' => 'TenggaraSpacePic2.png',
            'pic4' => 'TenggaraSpacePic3.png'
        ]);

        DB::table('billiard')->insert([
            'name' => 'Java Golden Billiard',
            'address' => 'Jalan Ir. H. Juanda No.115 Bekasi Junction (Hapimart) Lt.1 (Lantai, Paling, Atas Bekasi Junction, RT.001/RW.001, Margahayu, Bekasi (Kota, Kota Bks, Jawa Barat 17113',
            'rating' => 4.5,
            'totalrate' => 489,
            'priceperhour' => 44000,
            'description' => 'Large, low-key billiard hall with a cafe offering Indonesian fare alongside beer & soft drinks.',
            'openat' => '13.00 - 00.00',
            'telephone' => '0812-9711-7612',
            'whatsapp' => '-',
            'insta' => '@java_golden',
            'mainpic' => 'mainPic.jpg',
            'pic2' => 'pic1.png',
            'pic3' => 'pic2.png',
            'pic4' => 'pic3.png'
        ]);

        DB::table('billiard')->insert([
            'name' => 'Xavier Billiard Bekasi',
            'address' => 'RX6F+CPP, RT.004/RW.010, Medan Satria, Kecamatan Medan Satria, Kota Bks, Jawa Barat 17132',
            'rating' => 4.4,
            'totalrate' => 55,
            'priceperhour' => 40000,
            'description' => 'The best pool house in town with a great atmosphere',
            'openat' => 'Sunday, Wednesday, Friday, Saturday 11AM - 2AM And Monday, Tuesday, Thursday 12 PM - 2AM',
            'telephone' => '081298222574',
            'whatsapp' => '628998013163',
            'insta' => '@xavierbilliardbekasi',
            'mainpic' => 'mainPic.jpg',
            'pic2' => 'pic1.png',
            'pic3' => 'pic2.png',
            'pic4' => 'pic3.png'
        ]);

        DB::table('billiard')->insert([
            'name' => 'SKIES PUB Karaoke Billiard',
            'address' => 'Lantai LG Revo Town, Jl. A.Yani, RT.005/RW.002, Pekayon Jaya, Kec. Bekasi Sel., Kota Bks, Jawa Barat 17148',
            'rating' => 4.4,
            'totalrate' => 568,
            'priceperhour' => 50000,
            'description' => 'COZY PLACE IN BEKASI WITH 15 POOL TABLE',
            'openat' => '14.00 - 02.00',
            'telephone' => '(021) 82429907',
            'whatsapp' => '-',
            'insta' => '@skiespubkaraoke',
            'mainpic' => 'mainPic.jpg',
            'pic2' => 'pic1.png',
            'pic3' => 'pic2.png',
            'pic4' => 'pic3.png'
        ]);
    }
}
