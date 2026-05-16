<?php

// ============================================================
//  Migration: create_categories_table
//  A category has many products (One-to-Many relationship).
// ============================================================

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * This creates the "categories" table in the database.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();                          // Primary key: id (auto-increment)
            $table->string('name');                // Category name e.g. "Electronics"
            $table->text('description')->nullable(); // Optional description
            $table->timestamps();                  // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     * This drops the table if we roll back.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
