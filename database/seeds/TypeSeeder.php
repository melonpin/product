<?php

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'type' => 'Tシャツ',
            'data' => '2.2',//服の平均寿命
        ]);
        
        DB::table('types')->insert([
            'type' => 'ズボン',
            'data' => '2.6',//服の平均寿命
            
        ]);
        
         DB::table('types')->insert([
            'type' => 'スカート',
            'data' => '2.4',//服の平均寿命
        ]);
        
         DB::table('types')->insert([
            'type' => 'ワンピース',
            'data' => '2.9',//服の平均寿命
        ]);
    
    }
}
