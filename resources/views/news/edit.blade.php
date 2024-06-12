@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit News</h1>
    <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $news->title }}" required>
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" id="content" class="form-control" required>{{ $news->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="cover_image">Cover Image:</label>
            <input type="file" name="cover_image" id="cover_image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update News</button>
    </form>
</div>
@endsection
