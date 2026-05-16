<?php

namespace Database\Factories;

// ============================================================
//  Factory: CategoryFactory
//  Generates fake category data for seeding / testing.
// ============================================================

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        // List of realistic category names for an e-commerce store
        $categories = [
            'Electronics',
            'Clothing & Fashion',
            'Books',
            'Home & Garden',
            'Sports & Outdoors',
            'Toys & Games',
            'Beauty & Health',
            'Automotive',
        ];

        return [
            'name'        => $this->faker->unique()->randomElement($categories),
            'description' => $this->faker->sentence(10),
        ];
    }
}
