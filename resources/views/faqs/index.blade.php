<!DOCTYPE html>
<html>
<head>
    <title>FAQs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>FAQs</h1>
    <a href="{{ route('faqs.create') }}" class="btn btn-primary">Add FAQ</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>Question</th>
            <th>Answer</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($faqs as $faq)
        <tr>
            <td>{{ $faq->question }}</td>
            <td>{{ $faq->answer }}</td>
            <td>
                <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('faqs.edit', $faq->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
</body>
</html>


