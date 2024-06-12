@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $faq->question }}</h1>
    <p>{{ $faq->answer }}</p>
    <p>Category: {{ $faq->category->name }}</p>
</div>
@endsection
