<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Updateproductimages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_images', function (Blueprint $table){
            $table->renameColumn('image_name', 'image_one_name');
            $table->string('image_two_name')->nullable();
            $table->string('image_three_name')->nullable();
            $table->string('image_four_name')->nullable();
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
            $table->renameColumn('image_one_name', 'image_name');
            $table->dropColumn('image_two_name');
            $table->dropColumn('image_three_name');
            $table->dropColumn('image_four_name');
        });
    }
}
