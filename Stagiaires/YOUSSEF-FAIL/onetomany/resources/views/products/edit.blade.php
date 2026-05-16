@extends('layouts.app')
@section('title', 'Edit Product')
@section('content')

<div class="heading">
    <h2>Edit: {{ $product->name }}</h2>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">← Back</a>
</div>

<div class="card" style="max-width:540px">
    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf @method('PUT')

        <div class="form-group">
            <label for="category_id">Category *</label>
            <select id="category_id" name="category_id">
                <option value="">-- Select a category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="name">Product Name *</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}">
            @error('name') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="description">Description (optional)</label>
            <textarea id="description" name="description" rows="3">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="price">Price ($) *</label>
                <input type="number" id="price" name="price" step="0.01" min="0"
                       value="{{ old('price', $product->price) }}">
                @error('price') <div class="error-msg">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="stock">Stock *</label>
                <input type="number" id="stock" name="stock" min="0" value="{{ old('stock', $product->stock) }}">
                @error('stock') <div class="error-msg">{{ $message }}</div> @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-warning">Update Product</button>
    </form>
</div>

@endsection
