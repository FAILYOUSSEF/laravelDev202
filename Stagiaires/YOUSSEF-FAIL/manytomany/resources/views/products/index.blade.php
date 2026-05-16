@extends('layouts.app')
@section('title', 'Products')
@section('content')

<div class="heading">
    <h2>Products</h2>
    <a href="{{ route('products.create') }}" class="btn btn-green">+ Add Product</a>
</div>

@if($products->isEmpty())
    <div class="empty">No products yet. Add one!</div>
@else
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                {{-- ⭐ Now "Categories" (plural) — a product can have many --}}
                <th>Categories</th>
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
                        {{-- Loop through ALL categories this product belongs to --}}
                        @foreach($product->categories as $cat)
                            <span class="badge badge-dark">{{ $cat->name }}</span>
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
                        <form action="{{ route('products.destroy', $product) }}" method="POST"
                              onsubmit="return confirm('Delete this product?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@endsection
