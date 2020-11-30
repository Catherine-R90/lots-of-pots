<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Imagestable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_images', function (Blueprint $table){
            $table->renameColumn('primary_image', 'image_one');
            $table->renameColumn('second_image', 'image_two');
            $table->renameColumn('third_image', 'image_three');
            $table->string('image_one_name');
            $table->string('image_two_name')->nullable();
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
        Schema::table('product_images', function (Blueprint $table){
            $table->renameColumn('image_one', 'primary_image');
            $table->renameColumn('image_two', 'second_image');
            $table->renameColumn('image_three', 'third_image');
            $table->dropColumn('image_one_name');
            $table->dropColumn('image_two_name')->nullable();
            $table->dropColumn('image_three_name')->nullable();
        });
    }
}
