<?php

use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materials')->insert([
            
            'material' => '綿', 
            'data' => '0', 
           
        ]);
        
        DB::table('materials')->insert([
           
            'material' => 'ポリエステル', 
            'data' => '0', 
           
        ]);
        
         DB::table('materials')->insert([
             
            'material' => 'ウール', 
            'data' => '0', 
            
        ]);
        
         DB::table('materials')->insert([
             
            'material' => 'レーヨン', 
            'data' => '0', 
            
        ]);
    }
}
