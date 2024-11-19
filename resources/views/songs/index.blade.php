<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Songs Index</title>
</head>

<body class="bg-gray-100 p-6">
@include('layouts.nav')
    <div class="container mx-auto">
        <nav class="flex justify-between items-center py-4">
            <h1 class="text-2xl font-bold">Songs Management</h1>
            <a href="{{ route('songs.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Create New Song</a>
        </nav>

        <div class="bg-white p-6 rounded shadow-md mt-6">
            <h2 class="text-xl font-semibold mb-4">Songs List</h2>
            <ul class="divide-y divide-gray-200">
                @foreach ($songs as $song)
                    <li class="flex justify-between items-center py-4">
                        <div>
                            <a href="{{ route('songs.show', $song->id) }}" class="text-blue-600 hover:underline">
                                {{ $song->title }}
                            </a>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('songs.show', $song->id) }}"
                                class="bg-green-500 text-white py-1 px-3 rounded">Show</a>
                            <a href="{{ route('songs.edit', $song->id) }}"
                                class="bg-yellow-500 text-white py-1 px-3 rounded">Edit</a>
                            <form action="{{ route('songs.destroy', $song->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this song?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>

</html>
