<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventPlaceTable extends Migration {

	public function up()
	{
		Schema::create('event_place', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('en_name');
			$table->enum('Sitting_plan', array('call_row', 'cercle'));
			$table->integer('call_num')->nullable();
			$table->integer('row_num')->nullable();
			$table->string('image');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('event_place');
	}
}
