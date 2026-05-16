<?php

namespace App\Http\Controllers;



use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('categories')->latest()->get();
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
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'categories'  => 'required|array|min:1',      
            'categories.*'=> 'exists:categories,id',       
        ]);

        
        $product = Product::create($request->only('name', 'description', 'price', 'stock'));

        
        $product->categories()->sync($request->categories);

        return redirect()->route('products.index')
                         ->with('success', 'Product created!');
    }

    public function show(Product $product)
    {
        $product->load('categories');
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $selectedIds = $product->categories->pluck('id')->toArray();
        return view('products.edit', compact('product', 'categories', 'selectedIds'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'categories'  => 'required|array|min:1',
            'categories.*'=> 'exists:categories,id',
        ]);

        $product->update($request->only('name', 'description', 'price', 'stock'));

       
        $product->categories()->sync($request->categories);

        return redirect()->route('products.index')
                         ->with('success', 'Product updated!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
                         ->with('success', 'Product deleted!');
    }
}
