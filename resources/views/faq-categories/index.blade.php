@extends('layouts.app')

@section('content')
<div class="container">
    <h1>FAQ Categories</h1>
    <a href="{{ route('faq-categories.create') }}" class="btn btn-primary">Add Category</a>
    <ul class="list-group mt-3">
        @foreach($categories as $category)
            <li class="list-group-item">
                {{ $category->name }}
                <div>
                    <a href="{{ route('faq-categories.edit', $category) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('faq-categories.destroy', $category) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection

