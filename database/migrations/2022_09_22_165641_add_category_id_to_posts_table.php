<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   
    public function up() 
    {
    Schema::table('posts', function (Blueprint $table) {
        $table->integer('category_id')->unsigned();   //'category_id' は 'categoriesテーブル' の 'id' を参照する外部キーです
        $table->integer('category_condition_data')->nullable()->unsigned();
        $table->double('category_type_data', 2, 1)->nullable()->unsigned();
        $table->integer('category_material_data')->nullable()->unsigned();
        $table->double('category_frequency_data', 2, 1)->nullable()->unsigned();
        
        
    });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
}

