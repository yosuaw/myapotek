<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #1
        DB::table('categories')->insert(['name' => 'ANALGESIK NARKOTIK', 'description'=>'1.1. ANALGESIK NARKOTIK']);
        #2
        DB::table('categories')->insert(['name' => 'ANALGESIK NON NARKOTIK', 'description'=>'1.2. ANALGESIK NON NARKOTIK']);
        #3
        DB::table('categories')->insert(['name' => 'ANTIPIRAI', 'description'=>'1.3. ANTIPIRAI']);
        #4
        DB::table('categories')->insert(['name' => 'ANESTETIK LOKAL', 'description'=>'2.1 ANESTETIK LOKAL']);
        #5
        DB::table('categories')->insert(['name' => 'ANTIMIGREN', 'description'=>'7.1 ANTIMIGREN']);
        #6
        DB::table('categories')->insert(['name' => 'SITOTOKSIK', 'description'=>'8.3 SITOTOKSIK']);
        #7
        DB::table('categories')->insert(['name' => 'ANTIANEMI', 'description'=>'10.1 ANTIANEMI']);
        #8
        DB::table('categories')->insert(['name' => 'ANTIEPILEPSI - ANTIKONVULSI', 'description'=>'5 ANTIEPILEPSI - ANTIKONVULSI']);
        #9
        DB::table('categories')->insert(['name' => 'HORMON DAN ANTIHORMON', 'description'=>'8.1 HORMON DAN ANTIHORMON']);
        #10
        DB::table('categories')->insert(['name' => 'IMUNOSUPRESAN', 'description'=>'8.2 IMUNOSUPRESAN']);
    }
}