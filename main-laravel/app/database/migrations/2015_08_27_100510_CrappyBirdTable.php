<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrappyBirdTable extends Migration {

	public function up()
	{
		Schema::create('crappybird', function(Blueprint $table){
			$table->increments('score_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('score')->unsigned();
			$table->integer('map_of_death')->unsigned();
			$table->integer('device_id');
			$table->timestamps();
		});

		Schema::table('crappybird', function($table){
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('device_id')->references('id')->on('devices');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('crappybird');
	}

}
