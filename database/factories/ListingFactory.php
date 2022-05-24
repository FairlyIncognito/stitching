<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'number' => $this->faker->randomNumber(3, true),
            'name' => $this->faker->colorName(),
            'color' => $this->faker->hexColor(),
            'in_stock' => $this->faker->boolean()
        ];
    }
}