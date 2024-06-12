@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create News</h1>
    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" id="content" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="cover_image">Cover Image:</label>
            <input type="file" name="cover_image" id="cover_image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create News</button>
    </form>
</div>
@endsection
