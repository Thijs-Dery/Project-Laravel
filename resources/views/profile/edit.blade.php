<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div>
        <label for="avatar">Avatar:</label>
        <input type="file" name="avatar" id="avatar">
    </div>
    <div>
        <label for="birthday">Birthday:</label>
        <input type="date" name="birthday" id="birthday" value="{{ old('birthday', $profile->birthday) }}">
    </div>
    <div>
        <label for="bio">Bio:</label>
        <textarea name="bio" id="bio">{{ old('bio', $profile->bio) }}</textarea>
    </div>
    <button type="submit">Save</button>
</form>
