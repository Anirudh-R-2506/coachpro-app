<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Education;
use App\Enums\Session;
use App\Enums\UserRole;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('role', UserRole::getValues())->comment('0: Student, 1: Institute, 2: Admin, 3: Super Admin');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone')->unique();
            $table->enum('education', Education::getValues())->comment('0: School, 1: Undergraduate, 2: Postgraduate');
            $table->integer('class')->nullable();
            $table->integer('year_of_passing')->nullable();
            $table->enum('session', Session::getValues())->comment('0: Weekday, 1: Weekend, 2: Both, 3: Flexible')->nullable();
            $table->enum('timing', Timing::getValues())->comment('0: Forenoon, 1: Afternoon, 2: Evening, 3: Flexible')->nullable();
            $table->string('city');
            $table->string('locality')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
