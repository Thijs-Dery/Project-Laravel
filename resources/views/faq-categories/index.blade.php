@extends('layouts.app')

@section('content')
<div class="container">
    <h1>FAQ Categories</h1>
    <a href="{{ route('faq_categories.create') }}" class="btn btn-primary">Create Category</a>
    @foreach($categories as $category)
        <div>
            <h2>{{ $category->name }}</h2>
            <a href="{{ route('faq_categories.edit', $category->id) }}" class="btn btn-secondary">Edit</a>
            <form action="{{ route('faq_categories.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    @endforeach
</div>
@endsection
