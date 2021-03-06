<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeliveryAdresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_addresses', function (Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('first_line');
            $table->string('second_line')->nullable();
            $table->string('city');
            $table->string('postcode');
            $table->integer('phone_number');
            $table->string('email');
            $table->foreignId('user_id')->nullable()->constrained();
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
        Schema::dropIfExists('delivery_addresses');
    }
}
