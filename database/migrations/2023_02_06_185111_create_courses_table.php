<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Session;
use App\Enums\Timing;

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
            $table->id();
            $table->unsignedBigInteger('institute_id')->references('id')->on('institutes');
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
