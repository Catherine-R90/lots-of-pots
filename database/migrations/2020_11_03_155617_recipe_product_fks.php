<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecipeProductFks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_recipe_linker', function (Blueprint $table){
            $table->foreignId('product_id')->constrained();
            $table->foreignId('recipe_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_recipe_linker', function (Blueprint $table){
            $table->dropForeign('product_id');
            $table->dropForeign('recipe_id');
        });
    }
}
