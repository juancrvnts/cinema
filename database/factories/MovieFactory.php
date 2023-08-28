<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MovieFactory extends Factory
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
            'director' => $this->faker->name(),
            'duration' => $this->faker->randomNumber(3),
            'clasification' => $this->faker->word,
            'exhibited_from' => $this->faker->dateTimeBetween('now', '+1 months'),
            'exhibited_until' => $this->faker->dateTimeBetween('+1 day', '+4 months'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
