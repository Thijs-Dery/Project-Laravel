@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Profile</h1>
    <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <div class="form-group">
            <label for="birthday">Birthday:</label>
            <input type="date" name="birthday" id="birthday" class="form-control" value="{{ $profile ? $profile->birthday : '' }}" required>
        </div>
        <div class="form-group">
            <label for="avatar">Avatar:</label>
            <input type="file" name="avatar" id="avatar" class="form-control">
        </div>
        <div class="form-group">
            <label for="bio">About Me:</label>
            <textarea name="bio" id="bio" class="form-control">{{ $profile ? $profile->bio : '' }}</textarea>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control">
            <small>Leave blank to keep current password</small>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update Profile</button>
        <a href="{{ route('profile.show', $user->id) }}" class="btn btn-secondary">Show Profile</a>
    </form>
</div>
@endsection


