<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ingredients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table){
            $table->id();
            $table->string('ingredient_one');
            $table->integer('ingredient_quant_one');
            $table->string('ingredient_two')->nullable();
            $table->integer('ingredient_quant_two')->nullable();
            $table->string('ingredient_three')->nullable();
            $table->integer('ingredient_quant_three')->nullable();
            $table->string('ingredient_four')->nullable();
            $table->integer('ingredient_quant_four')->nullable();
            $table->string('ingredient_five')->nullable();
            $table->integer('ingredient_quant_five')->nullable();
            $table->string('ingredient_six')->nullable();
            $table->integer('ingredient_quant_six')->nullable();
            $table->string('ingredient_seven')->nullable();
            $table->integer('ingredient_quant_seven')->nullable();
            $table->string('ingredient_eight')->nullable();
            $table->integer('ingredient_quant_eight')->nullable();
            $table->string('ingredient_nine')->nullable();
            $table->integer('ingredient_quant_nine')->nullable();
            $table->string('ingredient_ten')->nullable();
            $table->integer('ingredient_quant_ten')->nullable();
            $table->foreignId('recipes_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recipes', function (Blueprint $table){
            $table->dropForeign(['recipes_id']);
        });

        Schema::dropIfExists('ingredients');
    }
}
