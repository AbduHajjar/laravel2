<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Create Album</title>
</head>

<body class="bg-gray-100 p-6">
    @include('layouts.nav')
    <div class="container mx-auto">
        <nav class="flex justify-between items-center py-4">
            <a href="{{ route('albums.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Home</a>
            <h1 class="text-2xl font-bold">Create New Album</h1>
        </nav>

        <div class="bg-white p-6 rounded shadow-md mt-6">
            <form action="{{ route('albums.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name:</label>
                    <input type="text" name="name" class="w-full px-3 py-2 border rounded"
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="year" class="block text-gray-700">Year:</label>
                    <input type="text" maxlength="4" name="year" class="w-full px-3 py-2 border rounded"
                        value="{{ old('year') }}">
                    @error('year')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="times_sold" class="block text-gray-700">Times Sold:</label>
                    <input type="text" name="times_sold" class="w-full px-3 py-2 border rounded"
                        value="{{ old('times_sold') }}">
                    @error('times_sold')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="band" class="block text-gray-700">Band:</label>
                    <select name="band_id" class="w-full px-3 py-2 border rounded">
                        @foreach ($bands as $band)
                            <option value = "{{ $band->id }}" {{ $band->id == old('band_id') ? 'selected' : '' }}>
                                {{ $band->name }}</option>
                        @endforeach
                    </select>
                    @error('band_id')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                

                <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded">Create</button>
            </form>
        </div>
    </div>
</body>

</html>
