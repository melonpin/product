<?php

use Illuminate\Database\Seeder;

class FrequencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('frequencies')->insert([
            'frequency' => '毎日',
            'data' => '0.8',//週2回以下月1未満なら1、毎日なら0.8、月1以上なら1.2
        ]);
        
        DB::table('frequencies')->insert([
            'frequency' => '1週間に1回',
            'data' => '1',//週2回以下月1未満なら1、毎日なら0.8、月1以上なら1.2
        ]);
        
         DB::table('frequencies')->insert([
            'frequency' => '1ヶ月に1回',
            'data' => '0.8',//週2回以下月1未満なら1、毎日なら0.8、月1以上なら1.2
        ]);
        
         DB::table('frequencies')->insert([
            'frequency' => '1年に1回',
            'data' => '1.2',//週2回以下月1未満なら1、毎日なら0.8、月1以上なら1.2
        ]);
    }
}
