@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $user->name }}'s Profile</h1>
    <div>
        <img src="/avatars/{{ $profile->avatar ?? 'default.png' }}" alt="Avatar" style="width: 150px; height: 150px;">
    </div>
    <div>
        <p><strong>Username:</strong> {{ $user->name }}</p>
        <p><strong>Birthday:</strong> {{ $profile->birthday ?? 'Not provided' }}</p>
        <p><strong>About Me:</strong></p>
        <p>{{ $profile->bio ?? 'No biography provided' }}</p>
    </div>
    <div>
        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
    </div>
</div>
@endsection
