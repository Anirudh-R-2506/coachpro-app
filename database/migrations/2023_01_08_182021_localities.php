<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('city_id')->references('id')->on('cities');
            $table->timestamps();
        });

        DB::table('localities')->insert([
            [
                'name' => 'Cantonment area',
                'city_id' => 1,
            ],
            [
                'name' => 'Domlur',
                'city_id' => 1,
            ],
            [
                'name' => 'Indiranagar',
                'city_id' => 1,
            ],
            [
                'name' => 'Jayanagar',
                'city_id' => 1,
            ],
            [
                'name' => 'Koramangala',
                'city_id' => 1,
            ],
            [
                'name' => 'Malleswaram',
                'city_id' => 1,
            ],
            [
                'name' => 'Marathahalli',
                'city_id' => 1,
            ],
            [
                'name' => 'Rajajinagar',
                'city_id' => 1,
            ],
            [
                'name' => 'Pete area',
                'city_id' => 1,
            ],
            [
                'name' => 'Whitefield',
                'city_id' => 1,
            ],
            [
                'name' => 'Yeshwanthpur',
                'city_id' => 1,
            ],
            [
                'name' => 'Basavanagudi',
                'city_id' => 1,
            ],
            [
                'name' => 'Bommanahalli',
                'city_id' => 1,
            ],
            [
                'name' => 'BTM Layout',
                'city_id' => 1,
            ],
            [
                'name' => 'CV Raman Nagar',
                'city_id' => 1,
            ],
            [
                'name' => 'Electronic City',
                'city_id' => 1,
            ],
            [
                'name' => 'Frazer Town',
                'city_id' => 1,
            ],
            [
                'name' => 'HSR Layout',
                'city_id' => 1,
            ],
            [
                'name' => 'Jalahalli',
                'city_id' => 1,
            ],
            [
                'name' => 'JP Nagar',
                'city_id' => 1,
            ],
            [
                'name' => 'Kalyan Nagar',
                'city_id' => 1,
            ],
            [
                'name' => 'Kammanahalli',
                'city_id' => 1,
            ],
            [
                'name' => 'Kengeri',
                'city_id' => 1,
            ],
            [
                'name' => 'Koramangala',
                'city_id' => 1,
            ],
            [
                'name' => 'Madiwala',
                'city_id' => 1,
            ],
            [
                'name' => 'Magadi Road',
                'city_id' => 1,
            ],
            [
                'name' => 'Mahadevapura',
                'city_id' => 1,
            ],
            [
                'name' => 'Marathahalli',
                'city_id' => 1,
            ],
            [
                'name' => 'Old Madras Road',
                'city_id' => 1,
            ],
            [
                'name' => 'Rajajinagar',
                'city_id' => 1,
            ],
            [
                'name' => 'Sarjapur Road',
                'city_id' => 1,
            ],
            [
                'name' => 'Shivajinagar',
                'city_id' => 1,
            ],
            [
                'name' => 'Ulsoor',
                'city_id' => 1,
            ],

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localities');
    }
};
