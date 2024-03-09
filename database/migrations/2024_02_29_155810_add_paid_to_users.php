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
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name_eng');
            $table->string('father_name_eng');
            $table->string('last_name_eng');
            $table->string('full_name_eng');
            $table->string('first_name_ar')->nullable();
            $table->string('father_name_ar')->nullable();
            $table->string('last_name_ar')->nullable();
            $table->string('full_name_ar')->nullable();
            $table->enum('gender',['male','female'])->default('male');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('mbl');
            $table->enum('status',['active','inactive'])->default('active');
            $table->string('last_login')->nullable();
            $table->integer('group_id');
            $table->integer('last_pass_modified')->nullable();
            $table->boolean('trusted')->nullable();
            $table->integer('coordinator')->nullable();
            $table->boolean('super_admin')->nullable();
            $table->string('nfc')->nullable();
            $table->string('pass_crypt')->nullable();
            $table->string('archive_sys_role')->nullable();
            $table->boolean('auth_level')->nullable();
            $table->string('course_bank')->nullable();
            $table->string('create_date')->nullable();
            $table->string('archive_file')->nullable();
            $table->string('sid');
            $table->string('photo')->nullable();
            $table->string('sid_photo')->nullable();
            $table->string('personal_email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('first_name_eng');
            $table->dropColumn('father_name_eng');
            $table->dropColumn('last_name_eng');
            $table->dropColumn('full_name_eng');
            $table->dropColumn('first_name_ar')->nullable();
            $table->dropColumn('father_name_ar')->nullable();
            $table->dropColumn('last_name_ar')->nullable();
            $table->dropColumn('full_name_ar')->nullable();
            $table->dropColumn('gender');
            $table->dropColumn('address')->nullable();
            $table->dropColumn('phone')->nullable();
            $table->dropColumn('mbl');
            $table->dropColumn('status',['active','inactive'])->default('inactive');
            $table->dropColumn('last_login')->nullable();
            $table->dropColumn('group_id');
            $table->dropColumn('last_pass_modified')->nullable();
            $table->dropColumn('trusted')->nullable();
            $table->dropColumn('coordinator')->nullable();
            $table->dropColumn('super_admin')->nullable();
            $table->dropColumn('nfc')->nullable();
            $table->dropColumn('pass_crypt')->nullable();
            $table->dropColumn('archive_sys_role')->nullable();
            $table->dropColumn('auth_level')->nullable();
            $table->dropColumn('course_bank')->nullable();
            $table->dropColumn('create_date')->nullable();
            $table->dropColumn('archive_file')->nullable();
            $table->dropColumn('sid');
            $table->dropColumn('photo')->nullable();
            $table->dropColumn('sid_photo')->nullable();
            $table->dropColumn('personal_email');
        });
    }
};
