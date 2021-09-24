<?php

namespace Database\Factories;

use App\Models\article;
use Illuminate\Database\Eloquent\Factories\Factory;

class articleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codeArticle' => $this->faker->postcode,
            'designation' => $this->faker->sentence,
            'prix' => $this->faker->randomDigitNotNull,
        ];
    }
}
