<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Courses;
use App\Models\Leads;
use App\Models\Bookings;
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
        Schema::table('media', function (Blueprint $table) {
            $table->uuid('model_id')->change();
        });

        Schema::table(config('activitylog.table_name'), function (Blueprint $table) {
            $table->uuid('causer_id')->change();
            $table->uuid('subject_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
