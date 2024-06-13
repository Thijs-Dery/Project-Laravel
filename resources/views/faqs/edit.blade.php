@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit FAQ</h1>
    <form action="{{ route('faqs.update', $faq) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="faq_category_id" class="form-label">Category</label>
            <select class="form-select" id="faq_category_id" name="faq_category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $faq->faq_category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="question" class="form-label">Question</label>
            <input type="text" class="form-control" id="question" name="question" value="{{ $faq->question }}" required>
        </div>
        <div class="mb-3">
            <label for="answer" class="form-label">Answer</label>
            <textarea class="form-control" id="answer" name="answer" rows="3" required>{{ $faq->answer }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update FAQ</button>
    </form>
</div>
@endsection
