@extends('layouts.app')
@section('title', 'Categories')
@section('content')

<div class="heading">
    <h2>Categories</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">+ Add Category</a>
</div>

@if($categories->isEmpty())
    <div class="empty">No categories yet. Add one!</div>
@else
    <div class="grid">
        @foreach($categories as $category)
            <div class="cat-card">
                <h3>{{ $category->name }}</h3>
                <p>{{ $category->description ?? 'No description.' }}</p>
                <span class="badge badge-gray">{{ $category->products_count }} product(s)</span>
                <div class="actions" style="margin-top:12px">
                    <a href="{{ route('categories.show', $category) }}" class="btn btn-secondary">View</a>
                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST"
                          onsubmit="return confirm('Delete this category?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endif

@endsection
