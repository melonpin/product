<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
     {
        $this->call([
            
            ConditionSeeder::class,
            TypeSeeder::class,
            FrequencySeeder::class,
            MaterialSeeder::class,
            
        ]);
    }
}
