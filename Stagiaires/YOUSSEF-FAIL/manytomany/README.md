# 🛒 Laravel E-Commerce — Many-to-Many Relationship
## Exercise: A product can belong to MANY categories

---

## ⭐ The Key Concept: Many-to-Many

```
Category ◄──────────────────► Product
         (can have many)   (can have many)
```

Example:
- "AirPods Pro" belongs to → Electronics, Audio, Phones
- "Running Shoes" belongs to → Sports, Clothing

This is different from One-to-Many where a product could only have ONE category.

---

## 🗄️ How the Database Looks

### Three tables (not two!)

**categories**
| id | name        |
|----|-------------|
| 1  | Electronics |
| 2  | Audio       |
| 3  | Phones      |

**products**
| id | name        | price  |
|----|-------------|--------|
| 5  | AirPods Pro | 249.00 |

**category_product** ← PIVOT TABLE (the bridge)
| category_id | product_id |
|-------------|------------|
| 1           | 5          |  ← AirPods in Electronics
| 2           | 5          |  ← AirPods in Audio
| 3           | 5          |  ← AirPods in Phones

---

## 📁 Project Structure

```
ecommerce2/
├── database/migrations/
│   ├── ..._create_categories_table.php   ← normal table
│   ├── ..._create_products_table.php     ← NO category_id here!
│   └── ..._create_category_product_table.php  ← PIVOT TABLE ⭐
│
├── app/Models/
│   ├── Category.php   → belongsToMany(Product::class)
│   └── Product.php    → belongsToMany(Category::class)
│
├── app/Http/Controllers/
│   ├── CategoryController.php
│   └── ProductController.php   ← uses sync() to save links
│
└── resources/views/
    ├── products/create.blade.php  ← checkboxes for categories
    └── products/edit.blade.php    ← pre-checked boxes
```

---

## 🚀 How to Run

```bash
# 1. Install dependencies
composer install

# 2. Setup environment
cp .env.example .env
php artisan key:generate

# 3. Create the SQLite file (Windows)
New-Item database\database.sqlite

# 4. Run all 3 migrations
php artisan migrate

# 5. Seed sample data
php artisan db:seed

# 6. Start the server
php artisan serve
```

Open: **http://localhost:8000**

---

## ⭐ Key Differences from One-to-Many

| | One-to-Many (Project 1) | Many-to-Many (Project 2) |
|--|--|--|
| Tables | 2 | 3 (+ pivot table) |
| Foreign key | In products table | In pivot table only |
| Model method | `hasMany` / `belongsTo` | `belongsToMany` on BOTH |
| Form input | `<select>` (one choice) | `<input checkbox[]>` (many) |
| Save method | `$product->category_id = x` | `$product->categories()->sync([])` |
| Pivot table | ❌ Not needed | ✅ `category_product` |

---

## 🔑 The 3 Pivot Methods

```php
// ADD categories (inserts pivot rows)
$product->categories()->attach([1, 2, 3]);

// REPLACE categories (removes old, adds new) — used in update()
$product->categories()->sync([2, 4]);

// REMOVE one category (deletes one pivot row)
$product->categories()->detach(1);

// REMOVE ALL categories
$product->categories()->detach();
```

---

## 💡 Naming Rule for Pivot Table

Laravel automatically finds the pivot table if you name it:
**model1_model2** in alphabetical order (singular, lowercase)

- Category + Product → `category_product` ✅
- User + Role → `role_user` ✅
- Post + Tag → `post_tag` ✅
