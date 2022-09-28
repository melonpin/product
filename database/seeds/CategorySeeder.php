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
            
            'material' => '綿', 
            'data' => '0', //今のところはデータ不足のため開けておく
           
        ]);
        
        DB::table('categories')->insert([
           
            'material' => 'ポリエステル', 
            'data' => '0', //今のところはデータ不足のため開けておく
           
        ]);
        
         DB::table('categories')->insert([
             
            'material' => 'ウール', 
            'data' => '0', //今のところはデータ不足のため開けておく
            
        ]);
        
         DB::table('categories')->insert([
             
            'material' => 'レーヨン', 
            'data' => '0', //今のところはデータ不足のため開けておく
        ]);
    }
}
