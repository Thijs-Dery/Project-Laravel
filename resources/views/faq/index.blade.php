@extends('layouts.app')

@section('content')
<div class="container">
    <h1>FAQs</h1>
    <a href="{{ route('faq.create') }}" class="btn btn-primary">Add FAQ</a>
    @foreach($faqs as $faq)
        <div>
            <h3>{{ $faq->question }}</h3>
            <p>{{ $faq->answer }}</p>
            <a href="{{ route('faq.edit', $faq->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('faq.destroy', $faq->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    @endforeach
</div>
@endsection
