<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('Students', function(Blueprint $table) {
			$table->foreign('term_id')->references('term_id')->on('Terms')
						->onDelete('set null')
						->onUpdate('set null');
		});
		Schema::table('Student_Program', function(Blueprint $table) {
			$table->foreign('program_id')->references('program_id')->on('Programs')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('Student_Program', function(Blueprint $table) {
			$table->foreign('student_id')->references('student_id')->on('Students')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('Student_Program', function(Blueprint $table) {
			$table->foreign('term_id')->references('term_id')->on('Terms')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('Specialisations', function(Blueprint $table) {
			$table->foreign('program_id')->references('program_id')->on('Programs')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
        Schema::table('Users', function(Blueprint $table) {
			$table->foreign('group_id')->references('group_id')->on('Groups')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('Students', function(Blueprint $table) {
			$table->dropForeign('Students_term_id_foreign');
		});
		Schema::table('Student_Program', function(Blueprint $table) {
			$table->dropForeign('Student_Program_program_id_foreign');
		});
		Schema::table('Student_Program', function(Blueprint $table) {
			$table->dropForeign('Student_Program_student_id_foreign');
		});
		Schema::table('Student_Program', function(Blueprint $table) {
			$table->dropForeign('Student_Program_term_id_foreign');
		});
		Schema::table('Specialisations', function(Blueprint $table) {
			$table->dropForeign('Specialisations_program_id_foreign');
		});
        Schema::table('Users', function(Blueprint $table) {
			$table->dropForeign('Users_group_id_foreign');
		});
	}
}
