<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Items>
 */
class ItemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_item' => fake()->word(),
            'type_item' => mt_rand(1,3),
            'no_item' => fake()->unique()->randomNumber(7, true),
            'qty_item' => fake()->numberBetween(1, 100),
            'brcd_item' => fake()->boolean()
        ];
    }
}
