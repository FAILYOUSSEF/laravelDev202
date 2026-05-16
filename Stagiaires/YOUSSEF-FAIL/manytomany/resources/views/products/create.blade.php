@extends('layouts.app')
@section('title', 'Add Product')
@section('content')

<div class="heading">
    <h2>Add Product</h2>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">← Back</a>
</div>

<div class="card" style="max-width:580px">

    <div class="hint">
        ⭐ <strong>Many-to-Many:</strong> You can select <strong>multiple categories</strong> for this product!
    </div>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Product Name *</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="e.g. AirPods Pro">
            @error('name') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="description">Description (optional)</label>
            <textarea id="description" name="description" rows="3">{{ old('description') }}</textarea>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="price">Price ($) *</label>
                <input type="number" id="price" name="price" step="0.01" min="0" value="{{ old('price') }}" placeholder="99.99">
                @error('price') <div class="error-msg">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="stock">Stock *</label>
                <input type="number" id="stock" name="stock" min="0" value="{{ old('stock', 0) }}">
                @error('stock') <div class="error-msg">{{ $message }}</div> @enderror
            </div>
        </div>

        {{-- ⭐ CHECKBOXES — the key difference from One-to-Many! --}}
        {{-- Each checked box sends categories[] with the category id --}}
        <div class="form-group">
            <label>Categories * (select one or more)</label>
            <div class="checkbox-grid">
                @foreach($categories as $category)
                    <label>
                        <input type="checkbox"
                               name="categories[]"
                               value="{{ $category->id }}"
                               {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                        {{ $category->name }}
                    </label>
                @endforeach
            </div>
            @error('categories') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-green">Save Product</button>
    </form>
</div>

@endsection
