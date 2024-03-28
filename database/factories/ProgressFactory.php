<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Progress>
 */
class ProgressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'weight' => $this->faker->numberBetween(50, 150),
            'height' => $this->faker->numberBetween(150, 200),
            'measurements' => $this->faker->randomElement(['Good', 'Average', 'Poor']),
            'performance' => $this->faker->randomElement(['High', 'Medium', 'Low']),
            'status'=> 'false',
            'user_id'=> User::factory(),
        ];
    }
}


//tfkri ila mab9atch 5dmat lik factory mora madrti tinker rak l9iti command that optmize [composer dump-autoload]