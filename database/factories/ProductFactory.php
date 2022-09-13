<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sku' => $this->faker->numerify('######'),
            'name' => $this->faker->name,
            'category' => $this->faker->word,
            'price' => $this->faker->numberBetween(100, 1000),
            'currency' => 'EUR'
        ];
    }
}
