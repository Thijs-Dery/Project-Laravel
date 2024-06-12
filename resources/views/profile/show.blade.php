<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <h1>{{ $user->name }}'s Profile</h1>
    <div>
        <img src="/avatars/{{ $user->avatar }}" alt="Avatar" style="width: 150px; height: 150px;">
    </div>
    <div>
        <p><strong>Username:</strong> {{ $user->name }}</p>
        <p><strong>Birthday:</strong> {{ $user->birthday }}</p>
        <p><strong>About Me:</strong></p>
        <p>{{ $user->bio }}</p>
    </div>
</div>
</body>
</html>

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $user->name }}</h1>
    <p>Email: {{ $user->email }}</p>
</div>
@endsection
