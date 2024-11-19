<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Edit Band</title>
</head>

<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <nav class="flex justify-between items-center py-4">
            <a href="{{ route('bands.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Home</a>
            <h1 class="text-2xl font-bold">Edit Band</h1>
        </nav>

        <div class="bg-white p-6 rounded shadow-md mt-6">
            <form action="{{ route('bands.update', $band->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Band Name:</label>
                    <input type="text" maxlength="255" name="name" value="{{ $band->name }}"
                        class="w-full px-3 py-2 border rounded" value="{{ old('name') }}">
                    @error('name')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="genre" class="block text-gray-700">Genre:</label>
                    <input type="text" maxlength="255" name="genre" value="{{ $band->genre }}"
                        class="w-full px-3 py-2 border rounded" value="{{ old('genre') }}">
                    @error('genre')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="founded" class="block text-gray-700">Founded:</label>
                    <input type="text" maxlength="4" name="founded" value="{{ $band->founded }}"
                        class="w-full px-3 py-2 border rounded" value="{{ old('founded') }}">
                    @error('founded')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="active_till" class="block text-gray-700">Active till:</label>
                    <input type="text" maxlength="4" name="active_till" value="{{ $band->active_till }}"
                        class="w-full px-3 py-2 border rounded" value="{{ old('active_till') }}">
                    @error('active_till')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded">Update</button>
            </form>
        </div>
    </div>
</body>

</html>
