<?php

namespace Database\Seeders;

// ============================================================
//  Seeder: DatabaseSeeder
//
//  ⭐ KEY CONCEPT — attaching Many-to-Many relationships:
//
//  $product->categories()->attach([1, 2, 3]);
//  → Inserts rows into category_product pivot table
//
//  $product->categories()->sync([1, 2]);
//  → Replaces all existing links with the new ones
//
//  $product->categories()->detach(1);
//  → Removes one link from the pivot table
// ============================================================

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ── Step 1: Create categories ────────────────────────
        $electronics = Category::create(['name' => 'Electronics',       'description' => 'Gadgets, phones, laptops and more.']);
        $computers   = Category::create(['name' => 'Computers',         'description' => 'Laptops, desktops and accessories.']);
        $phones      = Category::create(['name' => 'Phones',            'description' => 'Smartphones and accessories.']);
        $audio       = Category::create(['name' => 'Audio',             'description' => 'Headphones, speakers and sound gear.']);
        $clothing    = Category::create(['name' => 'Clothing',          'description' => 'T-shirts, jeans, shoes and fashion.']);
        $sports      = Category::create(['name' => 'Sports & Outdoors', 'description' => 'Gear for sports and outdoor activities.']);
        $books       = Category::create(['name' => 'Books',             'description' => 'Fiction, non-fiction and textbooks.']);
        $tech_books  = Category::create(['name' => 'Tech Books',        'description' => 'Programming and technology books.']);

        // ── Step 2: Create products ──────────────────────────
        $macbook = Product::create([
            'name'        => 'Apple MacBook Air M2',
            'description' => 'Thin and powerful laptop with Apple Silicon.',
            'price'       => 1099.00,
            'stock'       => 15,
        ]);

        $iphone = Product::create([
            'name'        => 'iPhone 15 Pro',
            'description' => 'Flagship smartphone with titanium design.',
            'price'       => 999.00,
            'stock'       => 30,
        ]);

        $airpods = Product::create([
            'name'        => 'AirPods Pro',
            'description' => 'Noise-cancelling wireless earbuds.',
            'price'       => 249.00,
            'stock'       => 60,
        ]);

        $sony_headphones = Product::create([
            'name'        => 'Sony WH-1000XM5',
            'description' => 'Premium over-ear noise-cancelling headphones.',
            'price'       => 349.99,
            'stock'       => 25,
        ]);

        $running_shoes = Product::create([
            'name'        => 'Nike Air Zoom Running Shoes',
            'description' => 'Lightweight shoes for daily running.',
            'price'       => 110.00,
            'stock'       => 80,
        ]);

        $sports_tshirt = Product::create([
            'name'        => 'Dry-Fit Sports T-Shirt',
            'description' => 'Breathable T-shirt for workouts.',
            'price'       => 29.99,
            'stock'       => 150,
        ]);

        $clean_code = Product::create([
            'name'        => 'Clean Code',
            'description' => 'A handbook of agile software craftsmanship by Robert C. Martin.',
            'price'       => 35.00,
            'stock'       => 40,
        ]);

        $gatsby = Product::create([
            'name'        => 'The Great Gatsby',
            'description' => 'Classic American novel by F. Scott Fitzgerald.',
            'price'       => 12.99,
            'stock'       => 70,
        ]);

        $laravel_book = Product::create([
            'name'        => 'Laravel: Up & Running',
            'description' => 'A guide to building modern PHP apps with Laravel.',
            'price'       => 49.99,
            'stock'       => 20,
        ]);

        // ── Step 3: Attach categories using the pivot table ──
        // ⭐ This is the Many-to-Many link in action!
        // attach() inserts rows into the category_product table.

        // MacBook → Electronics + Computers (belongs to 2 categories)
        $macbook->categories()->attach([$electronics->id, $computers->id]);

        // iPhone → Electronics + Phones (belongs to 2 categories)
        $iphone->categories()->attach([$electronics->id, $phones->id]);

        // AirPods → Electronics + Audio + Phones (belongs to 3 categories!)
        $airpods->categories()->attach([$electronics->id, $audio->id, $phones->id]);

        // Sony headphones → Electronics + Audio
        $sony_headphones->categories()->attach([$electronics->id, $audio->id]);

        // Running shoes → Sports + Clothing
        $running_shoes->categories()->attach([$sports->id, $clothing->id]);

        // Sports T-shirt → Sports + Clothing
        $sports_tshirt->categories()->attach([$sports->id, $clothing->id]);

        // Clean Code → Books + Tech Books
        $clean_code->categories()->attach([$books->id, $tech_books->id]);

        // The Great Gatsby → Books only
        $gatsby->categories()->attach([$books->id]);

        // Laravel book → Books + Tech Books
        $laravel_book->categories()->attach([$books->id, $tech_books->id]);

        echo "✅ Seeded " . Category::count() . " categories and " . Product::count() . " products with many-to-many links!\n";
    }
}
