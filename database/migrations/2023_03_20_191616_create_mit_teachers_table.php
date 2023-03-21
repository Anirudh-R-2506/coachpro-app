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
        Schema::create('mit_teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('subject');
            $table->string('branch')->nullable();
            $table->string('section')->nullable();
            $table->integer('year')->nullable();
            $table->integer('semester')->nullable();
            $$table->index(['branch', 'section', 'year', 'semester']);
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
        Schema::dropIfExists('mit_teachers');
    }
};
