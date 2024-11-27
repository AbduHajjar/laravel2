<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Show Album</title>
</head>

<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <nav class="flex justify-between items-center py-4">
            <a href="{{ route('albums.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Home</a>
            <h1 class="text-2xl font-bold">Album Details</h1>
        </nav>

        <div class="bg-white p-6 rounded shadow-md mt-6">

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name:</label>
                <input type="text" name="title" value="{{ $album->name }}" class="w-full px-3 py-2 border rounded"
                    readonly>
            </div>

            <div class="mb-4">
                <label for="year" class="block text-gray-700">Year:</label>
                <input type="text" name="year" value="{{ $album->year }}" class="w-full px-3 py-2 border rounded"
                    readonly>
            </div>

            <div class="mb-4">
                <label for="times_sold" class="block text-gray-700">Times Sold:</label>
                <input type="text" name="times_sold" value="{{ $album->times_sold }}"
                    class="w-full px-3 py-2 border rounded" readonly>
            </div>

            <div class="mb-4">
                <label for="band" class="block text-gray-700">Band:</label>
                <input type="text" name="band" value="{{ $album->band->name }}"
                    class="w-full px-3 py-2 border rounded" readonly>
            </div>

            <div class="mb-4">
                <label for="songs" class="block text-gray-700">Songs:</label>
                <ul>
                    @foreach ($album->songs as $song)
                        <li>{{ $song->title }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="flex space-x-4 mt-4">
                <a href="{{ route('albums.edit', $album->id) }}"
                    class="bg-yellow-500 text-white py-2 px-4 rounded">Edit</a>
                <form action="{{ route('albums.destroy', $album->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded">Delete</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
