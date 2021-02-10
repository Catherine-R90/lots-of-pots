<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIngredients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ingredients', function (Blueprint $table){
            $table->string('ingredient_eleven')->nullable();
            $table->unsignedBigInteger('ingredient_eleven_quant')->nullable();
            $table->string('ingredient_eleven_type')->nullable();

            $table->string('ingredient_twelve')->nullable();
            $table->unsignedBigInteger('ingredient_twelve_quant')->nullable();
            $table->string('ingredient_twelve_type')->nullable();

            $table->string('ingredient_thirteen')->nullable();
            $table->unsignedBigInteger('ingredient_thirteen_quant')->nullable();
            $table->string('ingredient_thirteen_type')->nullable();

            $table->string('ingredient_fourteen')->nullable();
            $table->unsignedBigInteger('ingredient_fourteen_quant')->nullable();
            $table->string('ingredient_fourteen_type')->nullable();

            $table->string('ingredient_fifteen')->nullable();
            $table->unsignedBigInteger('ingredient_fifteen_quant')->nullable();
            $table->string('ingredient_fifteen_type')->nullable();

            $table->string('ingredient_sixteen')->nullable();
            $table->unsignedBigInteger('ingredient_sixteen_quant')->nullable();
            $table->string('ingredient_sixteen_type')->nullable();
            
            $table->string('ingredient_seventeen')->nullable();
            $table->unsignedBigInteger('ingredient_seventeen_quant')->nullable();
            $table->string('ingredient_seventeen_type')->nullable();

            $table->string('ingredient_eighteen')->nullable();
            $table->unsignedBigInteger('ingredient_eighteen_quant')->nullable();
            $table->string('ingredient_eighteen_type')->nullable();

            $table->string('ingredient_ninenteen')->nullable();
            $table->unsignedBigInteger('ingredient_nineteen_quant')->nullable();
            $table->string('ingredient_nineteen_type')->nullable();

            $table->string('ingredient_twenty')->nullable();
            $table->unsignedBigInteger('ingredient_twenty_quant')->nullable();
            $table->string('ingredient_twenty_type')->nullable();
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
            $table->dropColumn('ingredient_eleven');
            $table->dropColumn('ingredient_eleven_quant');
            $table->dropColumn('ingredient_eleven_type');
            
            $table->dropColumn('ingredient_twelve');
            $table->dropColumn('ingredient_twelve_quant');
            $table->dropColumn('ingredient_twelve_type');

            $table->dropColumn('ingredient_thirteen');
            $table->dropColumn('ingredient_thirteen_quant');
            $table->dropColumn('ingredient_thirteen_type');

            $table->dropColumn('ingredient_fourteen');
            $table->dropColumn('ingredient_fourteen_quant');
            $table->dropColumn('ingredient_fourteen_type');

            $table->dropColumn('ingredient_fifteen');
            $table->dropColumn('ingredient_fifteen_quant');
            $table->dropColumn('ingredient_fifteen_type');

            $table->dropColumn('ingredient_sixteen');
            $table->dropColumn('ingredient_sixteen_quant');
            $table->dropColumn('ingredient_sixteen_type');

            $table->dropColumn('ingredient_seventeen');
            $table->dropColumn('ingredient_seventeen_quant');
            $table->dropColumn('ingredient_seventeen_type');

            $table->dropColumn('ingredient_eighteen');
            $table->dropColumn('ingredient_eighteen_quant');
            $table->dropColumn('ingredient_eighteen_type');

            $table->dropColumn('ingredient_ninenteen');
            $table->dropColumn('ingredient_nineteen_quant');
            $table->dropColumn('ingredient_nineteen_type');

            $table->dropColumn('ingredient_twenty');
            $table->dropColumn('ingredient_twenty_quant');
            $table->dropColumn('ingredient_twenty_type');
        });
    }
}
