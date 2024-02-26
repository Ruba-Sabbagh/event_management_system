<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialisationsTable extends Migration {

	public function up()
	{
		Schema::create('Specialisations', function(Blueprint $table) {
			$table->bigInteger('specialisation_id', true);
			$table->timestamps();
			$table->string('specialisation_name', 100);
			$table->string('specialisation_name_ar', 100);
			$table->string('specialisation_code', 50);
			$table->integer('program_id')->unsigned();
			$table->text('desc')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('Specialisations');
	}
}
