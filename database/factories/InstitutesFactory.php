<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Locality;
use App\Models\Institutes;
use App\Enums\AccountStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class InstitutesFactory extends Factory
{
    protected $model = Institutes::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'city_id' => City::inRandomOrder()->first()->id,
            'locality_id' => Locality::inRandomOrder()->first()->id,
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'rank'=> $this->faker->numberBetween(1, 100),
            'description' => $this->faker->paragraph(),
            'status' => array_rand(array_values(AccountStatus::getValues())),
        ];
    }
}
