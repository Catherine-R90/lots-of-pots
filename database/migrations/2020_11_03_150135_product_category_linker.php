<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductCategoryLinker extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_category_linker', function (Blueprint $table){
            $table->dropColumn('category_id');
        });
        // Schema::table('product_category_linker', function (Blueprint $table){
        //     $table->dropForeign(['category_id']);
        //     $table->foreignId('product_category_id');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_category_linker', function (Blueprint $table){
            $table->bigInteger('category_id');
        });
        // Schema::table('product_recipe_linker', function (Blueprint $table) {
        //     $table->foreignId('category_id');
        //     $table->dropForeign(['product_category_id']);
        // });
    }
}
