<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCommentImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comment_images', function (Blueprint $table){
            $table->string('comment_image')->change();
            $table->foreign('comment_id')->references('id')->on('comments');
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
        Schema::table('comment_images', function (Blueprint $table){
            $table->binary('comment_image')->change();
            $table->dropForeign(['comment_id']);
            $table->dropTimestamps();
        });
    }
}
