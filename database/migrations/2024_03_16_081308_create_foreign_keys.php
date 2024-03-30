<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('Event', function(Blueprint $table) {
			$table->foreign('event_place')->references('id')->on('event_place')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('chair', function(Blueprint $table) {
			$table->foreign('chairclass')->references('id')->on('chairclass')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('chair', function(Blueprint $table) {
			$table->foreign('event_id')->references('id')->on('Event')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('invitations', function(Blueprint $table) {
			$table->foreign('event_id')->references('id')->on('Event')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('invitations', function(Blueprint $table) {
			$table->foreign('nickname')->references('id')->on('Nicknames')
						->onDelete('set null')
						->onUpdate('set null');
		});
		Schema::table('invitations', function(Blueprint $table) {
			$table->foreign('nickname2')->references('id')->on('Nicknames2')
						->onDelete('set null')
						->onUpdate('set null');
		});
		Schema::table('invitations', function(Blueprint $table) {
			$table->foreign('class')->references('id')->on('Classes')
						->onDelete('set null')
						->onUpdate('set null');
		});
		Schema::table('invitations_chair', function(Blueprint $table) {
			$table->foreign('invitation_id')->references('id')->on('invitations')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('invitations_chair', function(Blueprint $table) {
			$table->foreign('chair_id')->references('id')->on('chair')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('invitations_chair', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('set null')
						->onUpdate('set null');
		});
	}

	public function down()
	{
		Schema::table('Event', function(Blueprint $table) {
			$table->dropForeign('Event_event_place_foreign');
		});
		Schema::table('chair', function(Blueprint $table) {
			$table->dropForeign('chair_chairclass_foreign');
		});
		Schema::table('chair', function(Blueprint $table) {
			$table->dropForeign('chair_event_id_foreign');
		});
		Schema::table('invitations', function(Blueprint $table) {
			$table->dropForeign('invitations_event_id_foreign');
		});
		Schema::table('invitations', function(Blueprint $table) {
			$table->dropForeign('invitations_nickname_foreign');
		});
		Schema::table('invitations', function(Blueprint $table) {
			$table->dropForeign('invitations_nickname2_foreign');
		});
		Schema::table('invitations', function(Blueprint $table) {
			$table->dropForeign('invitations_class_foreign');
		});
		Schema::table('invitations_chair', function(Blueprint $table) {
			$table->dropForeign('invitations_chair_invitation_id_foreign');
		});
		Schema::table('invitations_chair', function(Blueprint $table) {
			$table->dropForeign('invitations_chair_chair_id_foreign');
		});
		Schema::table('invitations_chair', function(Blueprint $table) {
			$table->dropForeign('invitations_chair_user_id_foreign');
		});
	}
}
