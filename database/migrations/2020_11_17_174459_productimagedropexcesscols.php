<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Productimagedropexcesscols extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_images', function (Blueprint $table){
            $table->dropColumn('image_two');
            $table->dropColumn('image_three');
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
        Schema::table('product_images', function (Blueprint $table){
            $table->binary('image_two');
            $table->binary('image_three');
            $table->string('image_two_name');
            $table->string('image_three_name');
        });
    }
}
