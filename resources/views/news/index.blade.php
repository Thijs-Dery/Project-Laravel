@extends('layouts.app')

@section('content')
<div class="container">
    <h1>News</h1>
    <a href="{{ route('news.create') }}" class="btn btn-primary">Create News</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Title</th>
                <th>Published At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $newsItem)
                <tr>
                    <td>{{ $newsItem->title }}</td>
                    <td>{{ $newsItem->published_at }}</td>
                    <td>
                        <a href="{{ route('news.edit', $newsItem->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('news.destroy', $newsItem->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


