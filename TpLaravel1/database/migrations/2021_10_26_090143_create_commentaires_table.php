<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id('id');
            $table->string('text');
            $table->bigInteger('UserID')->unsigned();
            $table->bigInteger("ArticleID")->unsigned();
            $table->timestamps();
            $table->foreign('UserID')->references('id')->on('users');
            $table->foreign('ArticleID')->references('id')->on('articles');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commentaires');
    }
}
