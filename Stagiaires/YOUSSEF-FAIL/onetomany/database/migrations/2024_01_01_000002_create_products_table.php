<?php

// ============================================================
//  Migration: create_products_table
//
//  KEY CONCEPT: One-to-Many relationship
//  - One Category has MANY Products
//  - Each Product BELONGS TO one Category
//  - We store category_id (foreign key) in this table
//    to link each product to its category.
// ============================================================

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();                          // Primary key

            // ⭐ FOREIGN KEY — this is the "many" side of the relationship
            // Each product row stores the id of the category it belongs to.
            $table->foreignId('category_id')
                  ->constrained()          // links to categories.id automatically
                  ->onDelete('cascade');   // if category deleted, its products are deleted too

            $table->string('name');                // Product name e.g. "iPhone 15"
            $table->text('description')->nullable(); // Optional description
            $table->decimal('price', 8, 2);        // Price e.g. 999.99
            $table->integer('stock')->default(0);  // How many in stock
            $table->timestamps();                  // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
