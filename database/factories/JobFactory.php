<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $skill1 = $this->faker->word;
        $skill2 = $this->faker->word;
        $skill3 = $this->faker->word;
        $skills = '["'.$skill1.'","'.$skill2.'","'.$skill3.'"]';
        return [
            'title' => $this->faker->jobTitle,
            'description' => $this->faker->text,
            'skills' => $skills,
            'country' => $this->faker->country,
            'city' => $this->faker->city,
            'company_id' =>$this->faker->numberBetween(101,200),
        ];
    }
}
