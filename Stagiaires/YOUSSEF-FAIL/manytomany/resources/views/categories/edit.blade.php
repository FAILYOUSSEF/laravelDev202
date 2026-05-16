@extends('layouts.app')
@section('title', 'Edit Category')
@section('content')

<div class="heading">
    <h2>Edit: {{ $category->name }}</h2>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">← Back</a>
</div>

<div class="card" style="max-width:500px">
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf @method('PUT')

        <div class="form-group">
            <label for="name">Name *</label>
            <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}">
            @error('name') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="description">Description (optional)</label>
            <textarea id="description" name="description" rows="3">{{ old('description', $category->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-warning">Update Category</button>
    </form>
</div>

@endsection
