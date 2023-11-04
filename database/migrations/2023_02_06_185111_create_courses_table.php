<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Courses;
use App\Enums\Education;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('institute_id')->references('id')->on('institutes')->onDelete('cascade');
            $table->string('name');
            $table->string('description');
            $table->string('duration');
            $table->bigInteger('fees'); 
            $table->enum('status', Courses::enum('status')->values())->default(Courses::enum('status')->values()[0]);
            $table->enum('availability', Courses::enum('availability')->values())->default(Courses::enum('availability')->values()[0]);
            $table->text('exams_accepted');
            $table->text('specialisations');
            $table->unsignedInteger('rank');
            $table->unsignedInteger('gradify_score');
            $table->enum('pre_education', Education::getValues());
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
        Schema::dropIfExists('courses');
    }
};
