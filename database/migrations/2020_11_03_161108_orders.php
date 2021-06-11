<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table){
            $table->id();
            $table->foreignId('user_id')
            ->nullable()
            ->constrained();
            $table->unsignedBigInteger('delivery_address_id');
            $table->unsignedBigInteger('order_status');
            $table->unsignedBigInteger('delivery_option')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table){
            $table->dropForeign(['user_id']);
        });
        Schema::drop('orders');
    }
}
