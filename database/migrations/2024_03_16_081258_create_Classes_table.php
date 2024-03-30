<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration {

	public function up()
	{
		Schema::create('Classes', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('colore');
			$table->enum('lang', array('en', 'ar'));
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('Classes');
	}
}
