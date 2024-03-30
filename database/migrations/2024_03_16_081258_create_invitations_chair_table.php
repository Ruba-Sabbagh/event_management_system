<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitationsChairTable extends Migration {

	public function up()
	{
		Schema::create('invitations_chair', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('invitation_id')->unsigned();
			$table->integer('chair_id')->unsigned();
			$table->boolean('status')->default(1);
			$table->datetime('data');
			$table->bigInteger('user_id')->unsigned()->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('invitations_chair');
	}
}
