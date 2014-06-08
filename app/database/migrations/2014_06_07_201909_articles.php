<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Articles extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        \Schema::create('articles', function(Blueprint $table) {
                $table->increments('article_id');
                $table->integer('user_id', false, true);
                $table->foreign('user_id')->references('user_id')->on('users')
                    ->onDelete('cascade')->onUpdate('cascade');
                $table->string('article_title');
                $table->text('article_body');
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
        //
        \Schema::drop('articles');
    }

}
