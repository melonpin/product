<?php

use Illuminate\Database\Seeder;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('conditions')->insert([
            'condition' => '新品',
            'data' => '0',//新品=0
            
        ]);
        DB::table('conditions')->insert([
            'condition' => '購入して1年以内',
            'data' => '1',//購入して1年
        ]);
        
        DB::table('conditions')->insert([
            'condition' => '購入して2年以内',
            'data' => '2',//購入して2年
                    ]);
        
        DB::table('conditions')->insert([
            'condition' => '購入して3年以内',
            'data' => '3',//購入して3年
        ]);
}
}