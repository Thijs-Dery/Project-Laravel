@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add FAQ</h1>
    <form action="{{ route('faqs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="faq_category_id" class="form-label">Category</label>
            <select class="form-select" id="faq_category_id" name="faq_category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="question" class="form-label">Question</label>
            <input type="text" class="form-control" id="question" name="question" required>
        </div>
        <div class="mb-3">
            <label for="answer" class="form-label">Answer</label>
            <textarea class="form-control" id="answer" name="answer" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add FAQ</button>
    </form>
</div>
@endsection
