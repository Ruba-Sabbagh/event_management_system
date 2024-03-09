<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration {

	public function up()
	{
		Schema::create('Programs', function(Blueprint $table) {
			$table->integer('program_id', true);
			$table->timestamps();
			$table->string('program_name', 100);
			$table->string('program_name_ar', 100);
			$table->string('program_code', 20);
			$table->text('desc')->nullable();
		});
	}

	public function down()
	{
		Schema::create('Programs', function(Blueprint $table) {
			$table->integer('program_id', true);
			$table->timestamps();
			$table->string('program_name', 100);
			$table->string('program_name_ar', 100);
			$table->string('program_code', 20);
			$table->text('desc')->nullable();
		});
	}
}
