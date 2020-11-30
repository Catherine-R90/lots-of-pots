<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Productimageidadd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_images', function (Blueprint $table){
            $table->foreignId('product_id');
            $table->renameColumn('image_one_name', 'image_name');
            $table->dropColumn('image_one');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_images', function (Blueprint $table){
            $table->foreignId('product_id');
            $table->renameColumn('image_name', 'image_one_name');
            $table->binary('image_one');
        });
    }
}
