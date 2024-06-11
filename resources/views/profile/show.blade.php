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
        <h1>{{ $profile->user->name }}'s Profile</h1>
        <div>
            <img src="/avatars/{{ $profile->avatar }}" alt="Avatar" style="width: 150px; height: 150px;">
        </div>
        <div>
            <p><strong>Username:</strong> {{ $profile->user->name }}</p>
            <p><strong>Birthday:</strong> {{ $profile->birthday }}</p>
            <p><strong>About Me:</strong></p>
            <p>{{ $profile->bio }}</p>
        </div>
    </div>
</body>
</html>

