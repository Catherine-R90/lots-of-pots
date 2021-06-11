<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NullableIngredients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ingredients', function (Blueprint $table){
            $table->string('ingredient_quant')->nullable()->change();
            $table->string('ingredient_quant_type')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ingredients', function (Blueprint $table){
            $table->string('ingredient_quant')->not_null()->change();
            $table->string('ingredient_quant_type')->not_null()->change();
        });
    }
}
