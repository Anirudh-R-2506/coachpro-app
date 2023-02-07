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
        Schema::create('edu_hunt_scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id')->references('id')->on('courses');
            $table->decimal('score', 2, 1);            
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
        Schema::dropIfExists('edu_hunt_scores');
    }
};
