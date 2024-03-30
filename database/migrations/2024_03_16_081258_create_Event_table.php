<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTable extends Migration {

	public function up()
	{
		Schema::create('Event', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->date('date');
			$table->time('time');
			$table->integer('event_place')->unsigned();
			$table->string('image1');
			$table->string('image2');
			$table->string('image3');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('Event');
	}
}
