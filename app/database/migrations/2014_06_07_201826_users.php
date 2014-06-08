<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        //
        \Schema::create('users', function(Blueprint $table) {
                $table->increments('user_id');
                $table->string('user_name', 32);
                $table->string('remember_token', 64);
                $table->string('password', 64);
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
        \Schema::drop('users');
	}

}
