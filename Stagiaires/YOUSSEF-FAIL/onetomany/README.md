# 🛒 Laravel E-Commerce — Beginner Exercise
## Topic: One-to-Many Database Relationships + Migrations

---

## 📖 What This Project Teaches

This project demonstrates the **One-to-Many** Eloquent relationship:

```
Category  ──has many──►  Products
Product   ──belongs to──► Category
```

One category (e.g. "Electronics") can have **many** products (iPhone, MacBook, etc.).
Each product stores a `category_id` (foreign key) to point back to its category.

---

## 🗂 Project Structure

```
ecommerce/
├── app/
│   ├── Http/Controllers/
│   │   ├── CategoryController.php   ← handles category CRUD
│   │   └── ProductController.php    ← handles product CRUD
│   └── Models/
│       ├── Category.php             ← hasMany(Product::class)
│       └── Product.php              ← belongsTo(Category::class)
│
├── database/
│   ├── migrations/
│   │   ├── ..._create_categories_table.php  ← migration 1
│   │   └── ..._create_products_table.php    ← migration 2 (has foreign key)
│   ├── factories/
│   │   ├── CategoryFactory.php
│   │   └── ProductFactory.php
│   └── seeders/
│       └── DatabaseSeeder.php       ← fills DB with sample data
│
├── resources/views/
│   ├── layouts/app.blade.php        ← main HTML layout
│   ├── categories/
│   │   ├── index.blade.php          ← list all categories
│   │   ├── show.blade.php           ← view one category + its products
│   │   ├── create.blade.php         ← add category form
│   │   └── edit.blade.php           ← edit category form
│   └── products/
│       ├── index.blade.php          ← list all products
│       ├── show.blade.php           ← view one product
│       ├── create.blade.php         ← add product form
│       └── edit.blade.php           ← edit product form
│
└── routes/web.php                   ← all URL routes
```

---

## 🚀 How to Run This Project

### Requirements
- PHP 8.1 or higher
- Composer
- MySQL (XAMPP / WAMP / Laragon) **or** SQLite (easier, no setup!)

---

### Step 1 — Copy this folder and install dependencies

```bash
cd ecommerce
composer install
```

---

### Step 2 — Set up your .env file

```bash
cp .env.example .env
php artisan key:generate
```

---

### Step 3 — Configure your database

**Option A — MySQL (XAMPP)**
Edit `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce_db    ← create this in phpMyAdmin first!
DB_USERNAME=root
DB_PASSWORD=
```

**Option B — SQLite (easiest, no server needed)**
Edit `.env`:
```
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/ecommerce/database/database.sqlite
```
Then create the file:
```bash
touch database/database.sqlite
```

---

### Step 4 — Run the migrations

This creates the `categories` and `products` tables:

```bash
php artisan migrate
```

You should see:
```
  Migrating: 2024_01_01_000001_create_categories_table
  Migrated:  2024_01_01_000001_create_categories_table
  Migrating: 2024_01_01_000002_create_products_table
  Migrated:  2024_01_01_000002_create_products_table
```

---

### Step 5 — Seed sample data (optional but recommended)

```bash
php artisan db:seed
```

This inserts 4 categories and 15 products into your database.

To reset and re-seed from scratch:
```bash
php artisan migrate:fresh --seed
```

---

### Step 6 — Start the development server

```bash
php artisan serve
```

Open your browser at: **http://localhost:8000**

---

## ⭐ Key Concepts Explained

### What is a Migration?
A migration is a PHP file that defines the structure of a database table.
Instead of writing SQL manually, you write PHP and Laravel creates the table for you.

```php
// This creates the "products" table
Schema::create('products', function (Blueprint $table) {
    $table->id();
    $table->foreignId('category_id')->constrained(); // ← FOREIGN KEY
    $table->string('name');
    $table->decimal('price', 8, 2);
    $table->timestamps();
});
```

### What is a Foreign Key?
`category_id` in the products table is a **foreign key**. It stores the `id` of the
category that this product belongs to. This is how the "Many" side links to the "One".

### The Relationship in the Models

**Category model** (the "One" side):
```php
public function products()
{
    return $this->hasMany(Product::class);
}
```

**Product model** (the "Many" side):
```php
public function category()
{
    return $this->belongsTo(Category::class);
}
```

### Using the Relationship in Code

```php
// Get all products of a category
$category = Category::find(1);
$products = $category->products; // ← uses hasMany

// Get the category of a product
$product = Product::find(1);
$categoryName = $product->category->name; // ← uses belongsTo
```

---

## 🌐 Available URLs

| URL | What it does |
|-----|-------------|
| `GET /` | Redirects to products |
| `GET /products` | List all products |
| `GET /products/create` | Add product form |
| `POST /products` | Save new product |
| `GET /products/{id}` | View product detail |
| `GET /products/{id}/edit` | Edit product form |
| `PUT /products/{id}` | Update product |
| `DELETE /products/{id}` | Delete product |
| `GET /categories` | List all categories |
| `GET /categories/create` | Add category form |
| `POST /categories` | Save new category |
| `GET /categories/{id}` | View category + its products |
| `GET /categories/{id}/edit` | Edit category form |
| `PUT /categories/{id}` | Update category |
| `DELETE /categories/{id}` | Delete category |

---

Good luck with your exercise! 🎓
