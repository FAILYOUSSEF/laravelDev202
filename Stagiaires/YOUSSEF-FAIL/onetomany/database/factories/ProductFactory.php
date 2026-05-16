<?php

namespace Database\Factories;

// ============================================================
//  Factory: ProductFactory
//  Generates fake product data for seeding / testing.
// ============================================================

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            // Pick a random existing category — this sets the foreign key
            'category_id' => Category::inRandomOrder()->first()->id,
            'name'        => $this->faker->words(3, true),
            'description' => $this->faker->paragraph(2),
            'price'       => $this->faker->randomFloat(2, 5, 999),  // price between $5 and $999
            'stock'       => $this->faker->numberBetween(0, 100),
        ];
    }
}
