<?php

namespace App\Http\Controllers;



use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        
        $products = Product::with('category')->latest()->get();

        return view('products.index', compact('products'));
    }

    
    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

  
   
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',  // must be a real category
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
                         ->with('success', 'Product added successfully!');
    }

   
    public function show(Product $product)
    {
        $product->load('category');

        return view('products.show', compact('product'));
    }

    
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

   
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
                         ->with('success', 'Product updated successfully!');
    }

  
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
                         ->with('success', 'Product deleted!');
    }
}
