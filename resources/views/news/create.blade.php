@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create News</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('news.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" required>
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea name="content" class="form-control" id="content" required>{{ old('content') }}</textarea>
            </div>
            <div class="form-group">
                <label for="published_at">Published At:</label>
                <input type="datetime-local" name="published_at" class="form-control" id="published_at" value="{{ old('published_at') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Create News</button>
        </form>
    </div>
@endsection







