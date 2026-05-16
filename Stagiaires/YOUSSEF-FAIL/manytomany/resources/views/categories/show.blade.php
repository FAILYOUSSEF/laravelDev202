@extends('layouts.app')
@section('title', $category->name)
@section('content')

<div class="breadcrumb">
    <a href="{{ route('categories.index') }}">Categories</a> / {{ $category->name }}
</div>

<div class="heading">
    <div>
        <h2>{{ $category->name }}</h2>
        <p style="color:#777; font-size:0.9rem; margin-top:4px">{{ $category->description ?? 'No description.' }}</p>
    </div>
    <a href="{{ route('products.create') }}" class="btn btn-green">+ Add Product</a>
</div>

<p style="margin-bottom:12px; font-size:0.9rem; color:#555">
    {{ count($products) }} product(s) in this category
</p>

@if($products->isEmpty())
    <div class="empty">No products in this category yet.</div>
@else
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>All Categories</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                        {{-- Show all categories of each product (loaded via pivot) --}}
                        @foreach($product->categories as $cat)
                            <span class="badge {{ $cat->id === $category->id ? 'badge-blue' : 'badge-gray' }}">
                                {{ $cat->name }}
                            </span>
                        @endforeach
                    </td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>
                        <span class="badge {{ $product->stock > 0 ? 'badge-green' : 'badge-red' }}">
                            {{ $product->stock > 0 ? $product->stock : 'Out' }}
                        </span>
                    </td>
                    <td style="display:flex; gap:6px">
                        <a href="{{ route('products.show', $product) }}" class="btn btn-secondary">View</a>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@endsection
