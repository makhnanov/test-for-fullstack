<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->numberBetween(0, 1) ? $this->faker->sentence() : null,
            'completed' => $this->faker->numberBetween(0, 1),
        ];
    }
}
