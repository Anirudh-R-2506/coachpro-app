<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Session;
use App\Enums\Timing;
use App\Models\Courses;

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
            $table->string('video_url');
            $table->text('faculties');
            $table->enum('session', Session::getValues())->comment('0: Weekday, 1: Weekend, 2: Both')->nullable();
            $table->enum('timing', Timing::getValues())->comment('0: Forenoon, 1: Afternoon, 2: Evening')->nullable();
            $table->text('subjects');
            $table->text('course_timings');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->bigInteger('fees'); 
            $table->enum('status', Courses::enum('status')->values())->default(Courses::enum('status')->values()[0]);
            $table->enum('availability', Courses::enum('availability')->values())->default(Courses::enum('availability')->values()[0]);
            $table->dropColumn('video_url');
            $table->string('slug');
            $table->enum('leads_status', Courses::enum('leads_status')->values())->default(Courses::enum('leads_status')->values()[0]);                       
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
