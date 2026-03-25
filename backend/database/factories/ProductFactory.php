<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 10, 100),
            'stock' => fake()->numberBetween(1, 100),
            'category_id' => Categorie::factory(),
        ];
    }
}
