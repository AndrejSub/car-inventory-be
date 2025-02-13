<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isRegistered = fake()->boolean(50);
        return [
            'name' => fake()->company(),
            'is_registered' => $isRegistered,
            'registration_number' => $isRegistered ? fake()->bothify('??###??') : null,
        ];
    }
}
