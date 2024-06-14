@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit News</h1>
    <form action="{{ route('news.update', $news) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $news->title }}" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" required>{{ $news->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="published_at">Published At</label>
            <input type="date" name="published_at" class="form-control" value="{{ $news->published_at->format('Y-m-d') }}" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">
            @if($news->image)
                <img src="{{ Storage::url($news->image) }}" alt="News Image" style="width: 200px;">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

