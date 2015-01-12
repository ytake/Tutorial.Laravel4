<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Inquirys extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        \Schema::create('inquirys', function(Blueprint $table) {
                $table->increments('inquiry_id');
                $table->integer('user_id', false, true)->nullable();
                $table->string('inquiry_name');
                $table->string('inquiry_email');
                $table->string('inquiry_title');
                $table->text('inquiry_body');
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
        \Schema::drop('inquirys');
    }

}
