<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('condition', 20);//服の状態
            $table->string('type', 20);//服の種類
            $table->string('material', 20);//服の素材
            $table->string('frequency', 20);//洗濯頻度
            $table->integer('condition_data')->nullable();//服の状態を数字に置き換えた
            $table->double('type_data', 2, 1)->nullable();//服の種類を数字に置き換えた
            $table->integer('material_data')->nullable();//服の素材を数字に置き換えた
            $table->double('frequency_data', 2, 1)->nullable();//洗濯頻度を数字に置き換えた
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
