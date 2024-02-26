<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration {

	public function up()
	{
		Schema::create('Students', function(Blueprint $table) {
			$table->bigInteger('student_id', true);
			$table->timestamps();
			$table->string('student_name', 50);
			$table->string('student_fname_ar', 50);
			$table->string('student_tname_ar', 50);
			$table->string('student_lname_ar', 50);
			$table->string('student_fname_en', 50);
			$table->string('student_tname_en', 50);
			$table->string('student_lname_en', 50);
			$table->string('studentsidn', 100);
			$table->string('password', 50);
			$table->integer('term_id')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('Students');
	}
}
