<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'condition' => '新品',
            'type' => 'Tシャツ',
            'material' => '綿', 
            'frequency' => '毎日',
            'condition_data' => '0',//新品=0
            'type_data' => '2.2',//服の平均寿命
            'material_data' => '0', //今のところはデータ不足のため開けておく
            'frequency_data' => '0.8',//週2回以下月1未満なら1、毎日なら0.8、月1以上なら1.2
        ]);
        
        DB::table('categories')->insert([
            'condition' => '購入して1年以内',
            'type' => 'ズボン',
            'material' => 'ポリエステル', 
            'frequency' => '1週間に1回',
            'condition_data' => '1',//新品=0
            'type_data' => '2.6',//服の平均寿命
            'material_data' => '0', //今のところはデータ不足のため開けておく
            'frequency_data' => '1',//週2回以下月1未満なら1、毎日なら0.8、月1以上なら1.2
        ]);
        
         DB::table('categories')->insert([
            'condition' => '購入して2年以内',
            'type' => 'スカート',
            'material' => 'ウール', 
            'frequency' => '1ヶ月に1回',
            'condition_data' => '2',//新品=1
            'type_data' => '2.4',//服の平均寿命
            'material_data' => '0', //今のところはデータ不足のため開けておく
            'frequency_data' => '0.8',//週2回以下月1未満なら1、毎日なら0.8、月1以上なら1.2
        ]);
        
         DB::table('categories')->insert([
            'condition' => '購入して3年以内',
            'type' => 'ワンピース',
            'material' => 'レーヨン', 
            'frequency' => '1年に1回',
            'condition_data' => '3',//新品=1
            'type_data' => '2.9',//服の平均寿命
            'material_data' => '0', //今のところはデータ不足のため開けておく
            'frequency_data' => '1.2',//週2回以下月1未満なら1、毎日なら0.8、月1以上なら1.2
        ]);
    }
}
