<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table){
            $table->string('comment', 2000)->change();
            $table->foreignId('user_id')->nullable()->change();
            $table->foreignId('comment_image_id')->nullable()->change();
            $table->timestamps();
            $table->string('user_session');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table){
            $table->string('comment', 500)->change();
            $table->foreignId('user_id')->not_null()->change();
            $table->foreignId('comment_image_id')->not_null()->change();
            $table->dropTimestamps();
            $table->dropColumn('user_session');
        });
    }
}
