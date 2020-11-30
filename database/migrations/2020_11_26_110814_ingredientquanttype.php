<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ingredientquanttype extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ingredients', function (Blueprint $table){
            $table->string('ingredient_one_type')->nullable();
            $table->string('ingredient_two_type')->nullable();
            $table->string('ingredient_three_type')->nullable();
            $table->string('ingredient_four_type')->nullable();
            $table->string('ingredient_five_type')->nullable();
            $table->string('ingredient_six_type')->nullable();
            $table->string('ingredient_seven_type')->nullable();
            $table->string('ingredient_eight_type')->nullable();
            $table->string('ingredient_nine_type')->nullable();
            $table->string('ingredient_ten_type')->nullable();
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
            $table->dropColumn('ingredient_one_type');
            $table->dropColumn('ingredient_two_type');
            $table->dropColumn('ingredient_three_type');
            $table->dropColumn('ingredient_four_type');
            $table->dropColumn('ingredient_five_type');
            $table->dropColumn('ingredient_six_type');
            $table->dropColumn('ingredient_seven_type');
            $table->dropColumn('ingredient_eight_type');
            $table->dropColumn('ingredient_nine_type');
            $table->dropColumn('ingredient_ten_type');
        });
    }
}
