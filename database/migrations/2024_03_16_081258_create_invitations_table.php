<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitationsTable extends Migration {

	public function up()
	{
		Schema::create('invitations', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('event_id')->unsigned();
			$table->integer('nickname')->unsigned()->nullable();
			$table->integer('nickname2')->unsigned();
			$table->integer('class')->unsigned()->nullable();
			$table->string('name');
			$table->string('email');
			$table->string('additional_email')->nullable();
			$table->string('side');
			$table->string('position');
			$table->enum('lang', array('en', 'ar'));
			$table->boolean('type')->default(0);
			$table->enum('status', array('wait', 'confirmed', 'apology'));
			$table->boolean('attendance');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('invitations');
	}
}
