<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChairTable extends Migration {

	public function up()
	{
		Schema::create('chair', function(Blueprint $table) {
			$table->increments('id');
			$table->string('code');
			$table->string('firstcode');
			$table->integer('chairclass')->unsigned();
			$table->integer('event_id')->unsigned();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('chair');
	}
}
