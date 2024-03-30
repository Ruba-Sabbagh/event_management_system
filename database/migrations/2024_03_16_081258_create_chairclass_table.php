<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChairclassTable extends Migration {

	public function up()
	{
		Schema::create('chairclass', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('img')->nullable();
			$table->string('colore');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('chairclass');
	}
}
