<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesarticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoriesarticles', function (Blueprint $table) {
            $table->bigInteger('CategoryID')->unsigned();
            $table->bigInteger('ArticleID')->unsigned();
            $table->timestamps();
            $table->foreign('CategoryID')->references('id')->on('categories');
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
        Schema::dropIfExists('categoriesarticles');
    }
}
