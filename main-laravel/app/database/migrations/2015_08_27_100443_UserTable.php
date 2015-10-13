<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table){
			$table->increments('id')->unsigned();
			$table->string('username')->unique();
			$table->string('password');
			$table->timestamps();
			$table->rememberToken();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
