<!DOCTYPE html>
<html>
<head>
    <title>Add New FAQ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Add New FAQ</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('faqs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="question">Question:</label>
            <input type="text" name="question" class="form-control" id="question" required>
        </div>
        <div class="form-group">
            <label for="answer">Answer:</label>
            <textarea name="answer" class="form-control" id="answer" required></textarea>
        </div>
        <div class="form-group">
            <label for="category_id">Category:</label>
            <select name="category_id" class="form-control" id="category_id">
                <option value="">None</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add FAQ</button>
    </form>
</div>
</body>
</html>




