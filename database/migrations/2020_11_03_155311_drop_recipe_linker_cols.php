<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropRecipeLinkerCols extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_recipe_linker', function (Blueprint $table){
            $table->dropColumn('products_id');
            $table->dropColumn('recipes_id');
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
            $table->unsignedBigInteger('products_id');
            $table->unsignedBigInteger('recipes_id');
        });
    }
}
