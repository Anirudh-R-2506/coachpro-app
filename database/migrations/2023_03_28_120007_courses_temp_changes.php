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
            $table->bigInteger('fees')->nullable()->change();
            $table->text('course_timings')->nullable()->change();
            $table->datetime('start_date')->nullable()->change();
            $table->datetime('end_date')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->bigInteger('fees')->nullable(false)->change();
            $table->text('course_timings')->nullable(false)->change();
            $table->datetime('start_date')->nullable(false)->change();
            $table->datetime('end_date')->nullable(false)->change();
        });
    }
};
