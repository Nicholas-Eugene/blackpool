<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['username' => 'user',
            'email' => 'user@example.com',
            'password' => Hash::make('user'),
            'is_admin'=>false,
            'profilepic' => 'noprofil.jpg'],
            ['username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'is_admin'=>true,
            'profilepic' => 'noprofil.jpg'],
        ]);
    }
}
