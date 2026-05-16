<?php

// ============================================================
//  Migration 2: create_products_table
//
//  KEY DIFFERENCE from One-to-Many:
//  There is NO category_id column here!
//  In Many-to-Many, we do NOT store the relationship inside
//  either table. Instead, we use a PIVOT TABLE (see migration 3).
// ============================================================

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->integer('stock')->default(0);
            $table->timestamps();
            // ⭐ Notice: NO category_id here!
            //    The link lives in the pivot table.
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
