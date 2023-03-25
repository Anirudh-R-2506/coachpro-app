<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            /* $table->dropForeign(['institute_id']); */
            $table->foreign('institute_id')->references('id')->on('institutes')->onDelete('cascade')->change();
        });

        Schema::table('faculties', function (Blueprint $table) {
            /* $table->dropForeign(['institute_id']); */
            $table->foreign('institute_id')->references('id')->on('institutes')->onDelete('cascade')->change();
        });

        Schema::table('institutes', function (Blueprint $table) {
            /* $table->dropForeign(['city_id']);
            $table->dropForeign(['locality_id']); */
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('locality_id')->references('id')->on('localities')->onDelete('cascade');
        });

        Schema::table('leads', function (Blueprint $table) {
            /* $table->dropForeign(['course_id']);
            $table->dropForeign(['institute_id']);
            $table->dropForeign(['user_id']); */
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->uuid('institute_id');
            $table->foreign('institute_id')->references('id')->on('institutes')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('bookings', function (Blueprint $table) {
            /* $table->dropForeign(['course_id']);
            $table->dropForeign(['institute_id']);
            $table->dropForeign(['user_id']); */
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->uuid('institute_id');
            $table->foreign('institute_id')->references('id')->on('institutes')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('faqs', function (Blueprint $table) {
            /* $table->dropForeign(['course_id']); */
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });

        Schema::table('users', function (Blueprint $table) {
            /* $table->dropForeign(['city']);
            $table->dropForeign(['locality']);
            $table->dropForeign(['institute_id']); */
            $table->foreign('city')->references('id')->on('cities');
            $table->foreign('locality')->references('id')->on('localities');
            $table->foreign('institute_id')->references('id')->on('institutes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
