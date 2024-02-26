<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentProgramTable extends Migration {

	public function up()
	{
		Schema::create('Student_Program', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('program_id')->unsigned();
			$table->bigInteger('student_id')->unsigned();
			$table->integer('term_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('Student_Program');
	}
}
