<?php

namespace Database\Seeders;

// ============================================================
//  Seeder: DatabaseSeeder
//
//  Seeds the database with sample categories and products.
//  Run with:  php artisan db:seed
//  Or reset:  php artisan migrate:fresh --seed
// ============================================================

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ── Step 1: Create categories manually (so names are readable) ──────
        $electronics = Category::create([
            'name'        => 'Electronics',
            'description' => 'Phones, laptops, tablets and all kinds of gadgets.',
        ]);

        $clothing = Category::create([
            'name'        => 'Clothing & Fashion',
            'description' => 'T-shirts, jeans, dresses, shoes and accessories.',
        ]);

        $books = Category::create([
            'name'        => 'Books',
            'description' => 'Fiction, non-fiction, textbooks and more.',
        ]);

        $sports = Category::create([
            'name'        => 'Sports & Outdoors',
            'description' => 'Equipment for all kinds of sports and outdoor activities.',
        ]);

        // ── Step 2: Create products that BELONG TO specific categories ───────
        // ⭐ Notice how we pass category_id to link each product to a category.

        // Electronics products
        Product::create(['category_id' => $electronics->id, 'name' => 'Samsung Galaxy S24',    'description' => 'Latest Android flagship smartphone.',       'price' => 799.99, 'stock' => 30]);
        Product::create(['category_id' => $electronics->id, 'name' => 'Apple MacBook Air M2',  'description' => 'Ultra-thin laptop with Apple silicon.',      'price' => 1099.00,'stock' => 15]);
        Product::create(['category_id' => $electronics->id, 'name' => 'Sony WH-1000XM5',       'description' => 'Premium noise-cancelling headphones.',        'price' => 349.99, 'stock' => 50]);
        Product::create(['category_id' => $electronics->id, 'name' => 'iPad Pro 12.9"',         'description' => 'Powerful tablet for work and creativity.',    'price' => 1099.99,'stock' => 20]);
        Product::create(['category_id' => $electronics->id, 'name' => 'Dell 27" 4K Monitor',   'description' => 'Crystal clear 4K display for your desk.',    'price' => 449.99, 'stock' => 12]);

        // Clothing products
        Product::create(['category_id' => $clothing->id, 'name' => 'Classic White T-Shirt',  'description' => '100% cotton comfortable everyday tee.',        'price' => 19.99, 'stock' => 200]);
        Product::create(['category_id' => $clothing->id, 'name' => 'Slim Fit Jeans',         'description' => 'Stylish dark-wash denim jeans.',               'price' => 59.99, 'stock' => 80]);
        Product::create(['category_id' => $clothing->id, 'name' => 'Running Sneakers',       'description' => 'Lightweight shoes for daily runs.',            'price' => 89.99, 'stock' => 60]);
        Product::create(['category_id' => $clothing->id, 'name' => 'Hoodie Sweatshirt',      'description' => 'Cozy fleece hoodie for cold days.',            'price' => 44.99, 'stock' => 100]);

        // Books products
        Product::create(['category_id' => $books->id, 'name' => 'Clean Code',              'description' => 'A handbook of agile software craftsmanship.',    'price' => 35.00, 'stock' => 45]);
        Product::create(['category_id' => $books->id, 'name' => 'The Great Gatsby',        'description' => 'Classic American novel by F. Scott Fitzgerald.', 'price' => 12.99, 'stock' => 70]);
        Product::create(['category_id' => $books->id, 'name' => 'Laravel: Up & Running',   'description' => 'A framework for building modern PHP apps.',      'price' => 49.99, 'stock' => 25]);

        // Sports products
        Product::create(['category_id' => $sports->id, 'name' => 'Yoga Mat',               'description' => 'Non-slip exercise mat for yoga and fitness.',    'price' => 29.99, 'stock' => 90]);
        Product::create(['category_id' => $sports->id, 'name' => 'Dumbbell Set 20kg',      'description' => 'Adjustable dumbbells for home gym workouts.',    'price' => 119.99,'stock' => 18]);
        Product::create(['category_id' => $sports->id, 'name' => 'Football',               'description' => 'Official size 5 football for outdoor play.',     'price' => 24.99, 'stock' => 55]);

        echo "✅ Database seeded with " . Category::count() . " categories and " . Product::count() . " products!\n";
    }
}
