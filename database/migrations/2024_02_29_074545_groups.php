<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Groups', function(Blueprint $table) {
			$table->integer('group_id', true);
			$table->timestamps();
			$table->string('group_name', 50);

		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('Groups');
    }
};
