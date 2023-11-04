<?php

namespace Database\Factories;

use App\Models\Courses;
use App\Enums\Education;
use App\Models\Institutes;
use Illuminate\Support\Str;
use App\Models\Examinations;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CoursesFactory extends Factory
{
    protected $model = Courses::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'description'=> $this->faker->sentence(),
            'institute_id' => Institutes::inRandomOrder()->first()->id,
            'duration' => '4 years',
            'fees' => $this->faker->randomNumber(5, true),            
            'exams_accepted' => Examinations::inRandomOrder()->limit(5)->pluck('id')->toArray(),
            'specialisations' => $this->faker->words($this->faker->randomDigit()),
            'rank' => $this->faker->randomDigit(),
            'pre_education' => Education::getValues()[array_rand(Education::getValues())],
            'gradify_score' => $this->faker->randomNumber(2, true),
        ];
    }
}
