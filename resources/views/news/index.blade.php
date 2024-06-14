@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>News</h1>
        <a href="{{ route('news.create') }}" class="btn btn-primary">Create News</a>
        @if (session('success'))
            <div class="alert alert-success mt-2">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger mt-2">
                {{ session('error') }}
            </div>
        @endif
        <table class="table mt-2">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Published At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $newsItem)
                    <tr>
                        <td>{{ $newsItem->title }}</td>
                        <td>{{ $newsItem->published_at }}</td>
                        <td>
                            <a href="{{ route('news.edit', $newsItem->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('news.destroy', $newsItem->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @foreach ($news as $item)
                    <div class="card mb-3">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">{{ $item->content }}</p>
                            <p class="card-text"><small class="text-muted">Published at {{ $item->published_at }}</small></p>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection



