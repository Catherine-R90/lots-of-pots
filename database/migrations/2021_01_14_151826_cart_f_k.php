<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CartFK extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cart', function (Blueprint $table){
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('product_image')->references('id')->on('product_images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cart', function (Blueprint $table){
            $table->dropForeign('product_id');
            $table->dropForeign('product_image');
        });
    }
}
