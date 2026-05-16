@extends('layouts.app')
@section('title', $product->name)
@section('content')

<div class="breadcrumb">
    <a href="{{ route('products.index') }}">Products</a> / {{ $product->name }}
</div>

<div class="card" style="max-width:560px">
    <h2 style="margin-bottom:12px">{{ $product->name }}</h2>

    <p style="margin-bottom:6px; font-size:0.9rem">
        <strong>Category:</strong>
        <a href="{{ route('categories.show', $product->category) }}"
           class="badge badge-dark" style="text-decoration:none">
            {{ $product->category->name }}
        </a>
    </p>

    <p style="color:#666; font-size:0.9rem; margin: 10px 0">
        {{ $product->description ?? 'No description.' }}
    </p>

    <hr style="border:none; border-top:1px solid #eee; margin:16px 0">

    <div style="display:flex; gap:40px; margin-bottom:16px">
        <div>
            <div style="font-size:1.4rem; font-weight:bold; color:#27ae60">
                ${{ number_format($product->price, 2) }}
            </div>
            <div style="font-size:0.8rem; color:#999">Price</div>
        </div>
        <div>
            <div style="font-size:1.4rem; font-weight:bold; color:{{ $product->stock > 0 ? '#222' : '#e74c3c' }}">
                {{ $product->stock }}
            </div>
            <div style="font-size:0.8rem; color:#999">In Stock</div>
        </div>
    </div>

    <div style="display:flex; gap:8px">
        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('products.destroy', $product) }}" method="POST"
              onsubmit="return confirm('Delete this product?')">
            @csrf @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
        <a href="{{ route('products.index') }}" class="btn btn-secondary" style="margin-left:auto">← Back</a>
    </div>
</div>

@endsection
