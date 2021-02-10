<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropExtraRecipeImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recipe_images', function (Blueprint $table){
            $table->dropColumn('image_two_name');
            $table->dropColumn('image_three_name');
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
            $table->string('image_two_name');
            $table->string('image_three_name');
        });
    }
}
