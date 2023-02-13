<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Institutes;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->uuid('city_id')->references('id')->on('cities');
            $table->uuid('locality_id')->references('id')->on('localities');
            $table->enum('leads_status', Institutes::enum('leads_status')->values())->default(Institutes::enum('leads_status')->values()[0]);
            $table->enum('bookings_status', Institutes::enum('bookings_status')->values())->default(Institutes::enum('bookings_status')->values()[0]);
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('institutes');
    }
};
