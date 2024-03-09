<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermsTable extends Migration {

	public function up()
	{
		Schema::create('Terms', function(Blueprint $table) {
			$table->increments('term_id', true);
			$table->timestamps();
			$table->string('term_name', 50);
			$table->bigInteger('year');
		});
	}

	public function down()
	{
		Schema::drop('Terms');
	}
}
