<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameIngredients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ingredients', function (Blueprint $table){
            $table->renameColumn('ingredient_ninenteen', 'ingredient_nineteen');
            $table->renameColumn('ingredient_eleven_quant', 'ingredient_quant_eleven');
            $table->renameColumn('ingredient_twelve_quant', 'ingredient_quant_twelve');
            $table->renameColumn('ingredient_thirteen_quant', 'ingredient_quant_thirteen');
            $table->renameColumn('ingredient_fourteen_quant', 'ingredient_quant_fourteen');
            $table->renameColumn('ingredient_fifteen_quant', 'ingredient_quant_fifteen');
            $table->renameColumn('ingredient_sixteen_quant', 'ingredient_quant_sixteen');
            $table->renameColumn('ingredient_seventeen_quant', 'ingredient_quant_seventeen');
            $table->renameColumn('ingredient_eighteen_quant', 'ingredient_quant_eighteen');
            $table->renameColumn('ingredient_nineteen_quant', 'ingredient_quant_nineteen');
            $table->renameColumn('ingredient_twenty_quant', 'ingredient_quant_twenty');
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
            $table->renameColumn('ingredient_quant_eleven', 'ingredient_eleven_quant');
            $table->renameColumn('ingredient_quant_twelve', 'ingredient_twelve_quant');
            $table->renameColumn('ingredient_quant_thirteen', 'ingredient_thirteen_quant');
            $table->renameColumn('ingredient_quant_fourteen', 'ingredient_fourteen_quant');
            $table->renameColumn('ingredient_quant_fifteen', 'ingredient_fifteen_quant');
            $table->renameColumn('ingredient_quant_sixteen', 'ingredient_sixteen_quant');
            $table->renameColumn('ingredient_quant_seventeen', 'ingredient_seventeen_quant');
            $table->renameColumn('ingredient_quant_eighteen', 'ingredient_eighteen_quant');
            $table->renameColumn('ingredient_quant_nineteen', 'ingredient_nineteen_quant');
            $table->renameColumn('ingredient_quant_twenty', 'ingredient_twenty_quant');
        });
    }
}
