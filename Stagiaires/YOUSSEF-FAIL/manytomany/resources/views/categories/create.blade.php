@extends('layouts.app')
@section('title', 'Add Category')
@section('content')

<div class="heading">
    <h2>Add Category</h2>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">← Back</a>
</div>

<div class="card" style="max-width:500px">
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name *</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="e.g. Electronics">
            @error('name') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="description">Description (optional)</label>
            <textarea id="description" name="description" rows="3">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save Category</button>
    </form>
</div>

@endsection
