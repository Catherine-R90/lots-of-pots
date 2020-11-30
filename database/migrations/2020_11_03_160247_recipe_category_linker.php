<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecipeCategoryLinker extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_category_linker', function (Blueprint $table){
            $table->id();
            $table->foreignId('recipe_id')->constrained();
            $table->unsignedBigInteger('recipe_category_id');
            $table->foreign('recipe_category_id')->references('id')->on('recipe_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe_category_linker');
    }
}
