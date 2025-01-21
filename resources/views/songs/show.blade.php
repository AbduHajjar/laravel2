<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Show Song</title>
</head>

<body class="bg-gray-100 p-6">
    @include('layouts.nav')
    <div class="container mx-auto">
        <nav class="flex justify-between items-center py-4">
            <a href="{{ route('songs.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Home</a>
            <h1 class="text-2xl font-bold">Song Details</h1>
        </nav>

        <div class="bg-white p-6 rounded shadow-md mt-6">

            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title:</label>
                <input type="text" name="title" value="{{ $song->title }}" class="w-full px-3 py-2 border rounded"
                    readonly>
            </div>

            <div class="mb-4">
                <label for="singer" class="block text-gray-700">Singer:</label>
                <input type="text" name="singer" value="{{ $song->singer }}" class="w-full px-3 py-2 border rounded"
                    readonly>
            </div>

            <div class="mb-4">
                <label for="albums" class="block text-gray-700">Albums:</label>
                <ul>
                    @foreach ($song->albums as $album)
                        <li>{{ $album->name }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="flex space-x-4 mt-4">
               @auth
                <a href="{{ route('songs.edit', $song->id) }}"
                    class="bg-yellow-500 text-white py-2 px-4 rounded">Edit</a>
                @endauth

                @auth
                <form action="{{ route('songs.destroy', $song->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded">Delete</button>
                </form>
                @endauth
            </div>
        </div>
    </div>
</body>

</html>
