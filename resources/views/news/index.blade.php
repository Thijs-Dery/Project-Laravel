@foreach($news as $item)
    <div>
        <h2>{{ $item->title }}</h2>
        <p>{{ $item->content }}</p>
        <img src="/images/{{ $item->cover_image }}" alt="Cover Image">
        <p>Published on: {{ $item->published_at }}</p>
    </div>
@endforeach
