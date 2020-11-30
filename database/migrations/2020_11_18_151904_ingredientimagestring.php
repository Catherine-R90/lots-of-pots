<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ingredientimagestring extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recipe_images', function (Blueprint $table){
            $table->dropColumn('image_one');
            $table->string('image_one_name');
            $table->dropColumn('image_two');
            $table->string('image_two_name')->nullable();
            $table->dropColumn('image_three');
            $table->string('image_three_name')->nullable();
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
            $table->dropColumn('image_one_name');
            $table->binary('image_one');
            $table->dropColumn('image_two_name');
            $table->binary('image_two')->nullable();
            $table->dropColumn('image_three');
            $table->binary('image_three_name')->nullable();
        });
    }
}
