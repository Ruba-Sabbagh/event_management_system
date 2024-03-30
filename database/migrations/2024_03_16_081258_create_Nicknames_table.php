<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNicknamesTable extends Migration {

	public function up()
	{
		Schema::create('Nicknames', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->enum('lang', array('en', 'ar'));
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('Nicknames');
	}
}
