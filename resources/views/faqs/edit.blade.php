@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit FAQ</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('faqs.update', $faq->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="question">Question:</label>
                <input type="text" name="question" class="form-control" id="question" value="{{ $faq->question }}" required>
            </div>
            <div class="form-group">
                <label for="answer">Answer:</label>
                <textarea name="answer" class="form-control" id="answer" required>{{ $faq->answer }}</textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Category:</label>
                <select name="category_id" class="form-control" id="category_id">
                    <option value="">None</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $faq->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update FAQ</button>
        </form>
    </div>
@endsection

