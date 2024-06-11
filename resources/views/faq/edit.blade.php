@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit FAQ</h1>
    <form action="{{ route('faq.update', $faq->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="question">Question:</label>
            <input type="text" name="question" id="question" class="form-control" value="{{ $faq->question }}" required>
        </div>
        <div class="form-group">
            <label for="answer">Answer:</label>
            <textarea name="answer" id="answer" class="form-control" required>{{ $faq->answer }}</textarea>
        </div>
        <div class="form-group">
            <label for="category_id">Category:</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == $faq->category_id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update FAQ</button>
    </form>
</div>
@endsection
