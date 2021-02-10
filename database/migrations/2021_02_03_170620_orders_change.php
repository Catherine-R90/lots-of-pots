<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrdersChange extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table){
            $table->foreignId('user_id')->nullable()->change();
            $table->integer('delivery_option');
            $table->string('session_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schmea::table('orders', function (Blueprint $table){
            $table->foreignId('user_id')->change();
            $table->dropColumn('delivery_option');
            $table->dropColumn('session_id');
        });
    }
}
