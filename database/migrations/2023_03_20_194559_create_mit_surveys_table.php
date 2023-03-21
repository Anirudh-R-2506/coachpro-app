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
        Schema::create('mit_surveys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->references('id')->on('mit_students');
            $table->unsignedBigInteger('teacher_id')->references('id')->on('mit_teachers');
            $table->text('data')->nullable();
            $table->index('student_id');
            $table->index('teacher_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mit_surveys');
    }
};
