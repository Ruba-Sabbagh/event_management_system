<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNicknames2Table extends Migration {

	public function up()
	{
		Schema::create('Nicknames2', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->enum('lang', array('en', 'ar'));
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('Nicknames2');
	}
}
