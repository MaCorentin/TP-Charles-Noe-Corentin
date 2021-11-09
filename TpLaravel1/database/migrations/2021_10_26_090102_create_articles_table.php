<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id('id');
            $table->string('name')->nullable(false);
            $table->string('description');
            $table->bigInteger('CategoryID')->unsigned();
            $table->bigInteger('UserCreateID')->unsigned();
            $table->bigInteger('LastModifyUserID')->unsigned();
            $table->timestamps();
            $table->foreign('CategoryID')->references('id')->on('categories');
            $table->foreign('UserCreateID')->references('id')->on('users');
            $table->foreign('LastModifyUserID')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
