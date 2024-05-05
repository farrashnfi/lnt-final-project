<!DOCTYPE html>
<html>

<head>
    <title>Edit new item</title>
</head>

<body>
    <h1>Edit new item</h1>
    <a href="/items">back</a>

    <form action="/items/{{ $item->id }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $item->name }}" required>
        <label for="name">Price:</label>
        <input type="number" id="price" name="price" min="0" value="{{ $item->price }}" required>
        <label for="name">Stock:</label>
        <input type="number" id="stock" name="stock" min="0" value="{{ $item->stock }}" required>

        <label for="category">Category:</label>
        <select id="category" name="category_id" required>
            <option value="">select category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if ($item->category->id == $category->id) selected @endif>
                    {{ $category->name }}</option>
            @endforeach
        </select>

        <button type="submit">Edit</button>
    </form>
</body>

</html>
