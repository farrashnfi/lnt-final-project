<!DOCTYPE html>
<html>

<head>
    <title>Items</title>
</head>

<body>
    <h1>All Items</h1>
    <a href="/items/create">Create new item</a>
    @foreach ($items as $item)
        <div>
            <h2>{{ $item->name }}</h2>
            <p>Price: Rp. {{ number_format($item->price, 2, ',', '.') }}</p>
            <p>Stock: {{ $item->stock }}</p>
            <p>Category: {{ $item->category->name }}</p>
            <a href="/items/{{ $item->id }}">Edit</a>
            <form action="/items/{{ $item->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
            <button>Buy</button>
        </div>
    @endforeach
</body>

</html>
