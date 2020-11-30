<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ingredientimagerename extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recipe_images', function (Blueprint $table){
            $table->string('primary_image')->change();
            $table->renameColumn('primary_image', 'image_one');
            $table->string('second_image')->nullable()->change();
            $table->renameColumn('second_image', 'image_two');
            $table->string('third_image')->nullable()->change();
            $table->renameColumn('third_image', 'image_three');
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
            $table->binary('primary_image')->change();
            $table->renameColumn('image_one', 'primary_image');
            $table->binary('second_image')->nullable()->change();
            $table->renameColumn('image_two', 'second_image');
            $table->binary('third_image')->nullable()->change();
            $table->renameColumn('image_three', 'third_image');
        });
    }
}
