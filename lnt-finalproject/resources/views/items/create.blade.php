<!DOCTYPE html>
<html>

<head>
    <title>Create new item</title>
</head>

<body>
    <h1>Create new item</h1>
    <a href="/items">back</a>

    <form action="/items" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="name">Price:</label>
        <input type="number" id="price" name="price" min="0" required>
        <label for="name">Stock:</label>
        <input type="number" id="stock" name="stock" min="0" required>

        <label for="category">Category:</label>
        <select id="category" name="category_id" required>
            <option value="">select category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <button type="submit">Create</button>
    </form>
</body>

</html>
