<?php

// ============================================================
//  Migration 3: create_category_product_table  ← PIVOT TABLE
//
//  This is the most important migration for Many-to-Many!
//
//  A PIVOT TABLE sits between the two main tables and stores
//  each "connection" between a product and a category.
//
//  Example rows inside this table:
//  ┌─────────────┬────────────┐
//  │ category_id │ product_id │
//  ├─────────────┼────────────┤
//  │      1      │     5      │  ← Product 5 is in Category 1
//  │      2      │     5      │  ← Product 5 is ALSO in Category 2
//  │      3      │     5      │  ← Product 5 is ALSO in Category 3
//  │      1      │     7      │  ← Product 7 is in Category 1
//  └─────────────┴────────────┘
//
//  NAMING RULE: Laravel expects the table name to be the two
//  model names in alphabetical order, separated by underscore:
//  category + product → category_product  (c comes before p)
// ============================================================

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('category_product', function (Blueprint $table) {

            // Foreign key pointing to categories table
            $table->foreignId('category_id')
                  ->constrained()
                  ->onDelete('cascade');

            // Foreign key pointing to products table
            $table->foreignId('product_id')
                  ->constrained()
                  ->onDelete('cascade');

            // Together, these two columns form the PRIMARY KEY
            // This prevents duplicate links (same product+category twice)
            $table->primary(['category_id', 'product_id']);

        });
        // ⭐ No id(), no timestamps() needed in a basic pivot table
    }

    public function down(): void
    {
        Schema::dropIfExists('category_product');
    }
};
