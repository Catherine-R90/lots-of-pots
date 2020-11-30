<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_product_linker', function (Blueprint $table){
            $table->dropForeign('order_product_linker_user_id_foreign');
            $table->dropColumn('order_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_product_linker', function (Blueprint $table){
            $table->foreignId('user_id')->constrained();
            $table->bigInteger('order_id');
        });
    }
}
