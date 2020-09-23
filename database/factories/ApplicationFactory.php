<?php

namespace Database\Factories;

use App\Models\Application;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ApplicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Application::class;

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
            'job_id' => $this->faker->j,
            'user_id' => $this->faker->text,
            'skills' => $skills,
            'country' => $this->faker->country,
            'city' => $this->faker->city,
        ];
    }
}
