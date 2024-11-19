<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Create Song</title>
</head>

<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <nav class="flex justify-between items-center py-4">
            <a href="{{ route('songs.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Home</a>
            <h1 class="text-2xl font-bold">Create New Song</h1>
        </nav>

        <div class="bg-white p-6 rounded shadow-md mt-6">
            <form action="{{ route('songs.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-gray-700">Song Title:</label>
                    <input type="text" name="title" class="w-full px-3 py-2 border rounded"
                        value="{{ old('title') }}">
                    @error('title')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="singer" class="block text-gray-700">Singer:</label>
                    <input type="text" name="singer" class="w-full px-3 py-2 border rounded"
                        value="{{ old('singer') }}">
                    @error('singer')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded">Create</button>
            </form>
        </div>
    </div>
</body>

</html>
