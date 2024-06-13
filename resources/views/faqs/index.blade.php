@extends('layouts.app')

@section('content')
<div class="container">
    <h1>FAQs</h1>
    <a href="{{ route('faqs.create') }}" class="btn btn-primary">Add FAQ</a>
    <a href="{{ route('faq-categories.index') }}" class="btn btn-secondary">FAQ Categories</a>
    <ul class="list-group mt-3">
        @foreach($faqs as $faq)
            <li class="list-group-item">
                <strong>{{ $faq->question }}</strong><br>
                {{ $faq->answer }}<br>
                <small>Category: {{ $faq->category->name }}</small>
                <div>
                    <a href="{{ route('faqs.edit', $faq) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('faqs.destroy', $faq) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection


