<?php

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
            'name' => 'Yosua Wijaya',
            'email' => "yosua@gmail.com",
            'password' => Hash::make("password"),
            "role" => "customer"
        ]);

        DB::table('users')->insert([
            'name' => 'Hendri Antonius',
            'email' => "hendri123@gmail.com",
            'password' => Hash::make("password"),
            "role" => "customer"
        ]);

        DB::table('users')->insert([
            'name' => 'Bryan Immanuel',
            'email' => "bryani@gmail.com",
            'password' => Hash::make("password"),
            "role" => "customer"
        ]);

        DB::table('users')->insert([
            'name' => 'Wirya Wonggo',
            'email' => "wiryawonggo@gmail.com",
            'password' => Hash::make("password"),
            "role" => "customer"
        ]);

        DB::table('users')->insert([
            'name' => 'Joshua Albertus',
            'email' => "joshua@gmail.com",
            'password' => Hash::make("password"),
            "role" => "customer"
        ]);

        DB::table('users')->insert([
            'name' => 'Felix Handani',
            'email' => "felix@gmail.com",
            'password' => Hash::make("password"),
            "role" => "administrator"
        ]);
    }
}
