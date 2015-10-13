<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeviceTable extends Migration {

	public function up()
	{
		Schema::create('devices', function(Blueprint $table){
			$table->increments('id')->unsigned();
			$table->string('name');
		});
	}

	public function down()
	{
		Schema::drop('devices');
	}

}
