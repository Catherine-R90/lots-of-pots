<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductRecipeLinker extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_recipe_linker', function (Blueprint $table) {
            $table->id();
            $table->foreignId('products_id');
            $table->foreignId('recipes_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_recipe_linker', function (Blueprint $table) {
            $table->dropForeign(['products_id']);
        });
        
        Schema::table('product_recipe_linker', function (Blueprint $table) {
            $table->dropForeign(['recipes_id']);
        });

        Schema::dropIfExists('product_recipe_linker');
    }
}
