<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\City;
use App\Models\Locality;

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
            $table->uuid('id')->primary();
            $table->string('name');
            $table->uuid('city_id')->references('id')->on('cities');
            $table->timestamps();
        });

        $id = City::where('name', 'Bangalore')->first()->id;

        $values = [
            [
                'name' => 'Cantonment area',
                'city_id' => $id,
            ],
            [
                'name' => 'Domlur',
                'city_id' => $id,
            ],
            [
                'name' => 'Indiranagar',
                'city_id' => $id,
            ],
            [
                'name' => 'Jayanagar',
                'city_id' => $id,
            ],
            [
                'name' => 'Koramangala',
                'city_id' => $id,
            ],
            [
                'name' => 'Malleswaram',
                'city_id' => $id,
            ],
            [
                'name' => 'Marathahalli',
                'city_id' => $id,
            ],
            [
                'name' => 'Rajajinagar',
                'city_id' => $id,
            ],
            [
                'name' => 'Pete area',
                'city_id' => $id,
            ],
            [
                'name' => 'Whitefield',
                'city_id' => $id,
            ],
            [
                'name' => 'Yeshwanthpur',
                'city_id' => $id,
            ],
            [
                'name' => 'Basavanagudi',
                'city_id' => $id,
            ],
            [
                'name' => 'Bommanahalli',
                'city_id' => $id,
            ],
            [
                'name' => 'BTM Layout',
                'city_id' => $id,
            ],
            [
                'name' => 'CV Raman Nagar',
                'city_id' => $id,
            ],
            [
                'name' => 'Electronic City',
                'city_id' => $id,
            ],
            [
                'name' => 'Frazer Town',
                'city_id' => $id,
            ],
            [
                'name' => 'HSR Layout',
                'city_id' => $id,
            ],
            [
                'name' => 'Jalahalli',
                'city_id' => $id,
            ],
            [
                'name' => 'JP Nagar',
                'city_id' => $id,
            ],
            [
                'name' => 'Kalyan Nagar',
                'city_id' => $id,
            ],
            [
                'name' => 'Kammanahalli',
                'city_id' => $id,
            ],
            [
                'name' => 'Kengeri',
                'city_id' => $id,
            ],
            [
                'name' => 'Koramangala',
                'city_id' => $id,
            ],
            [
                'name' => 'Madiwala',
                'city_id' => $id,
            ],
            [
                'name' => 'Magadi Road',
                'city_id' => $id,
            ],
            [
                'name' => 'Mahadevapura',
                'city_id' => $id,
            ],
            [
                'name' => 'Marathahalli',
                'city_id' => $id,
            ],
            [
                'name' => 'Old Madras Road',
                'city_id' => $id,
            ],
            [
                'name' => 'Rajajinagar',
                'city_id' => $id,
            ],
            [
                'name' => 'Sarjapur Road',
                'city_id' => $id,
            ],
            [
                'name' => 'Shivajinagar',
                'city_id' => $id,
            ],
            [
                'name' => 'Ulsoor',
                'city_id' => $id,
            ],

        ];

        for ($i = 0; $i < count($values); $i++) {
            Locality::create($values[$i]);
        }
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
