<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecipeImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_images', function (Blueprint $table) {
            $table->id();
            $table->binary('primary_image');
            $table->binary('second_image')->nullable();
            $table->binary('third_image')->nullable();
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
        Schema::table('recipe_images', function (Blueprint $table){
            $table->dropForeign(['products_id']);
        });

        Schema::dropIfExists('recipe_images');
    }
}
