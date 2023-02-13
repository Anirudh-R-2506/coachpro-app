<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Bookings;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->uuid('user_id')->references('id')->on('users');
            $table->uuid('lead_id')->references('id')->on('leads')->nullable();
            $table->enum('status', Bookings::enum('status')->values())->default(Bookings::enum('status')->values()[0]);
            $table->string('payment_id')->nullable();
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
        Schema::dropIfExists('bookings');
    }
};
