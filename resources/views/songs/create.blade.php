<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Create Song</title>
</head>

<body class="bg-gray-100 p-6">
    @include('layouts.nav')
    <div class="container mx-auto">
        <nav class="flex justify-between items-center py-4">
            <a href="{{ route('songs.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Home</a>
            <h1 class="text-2xl font-bold">Create New Song</h1>
        </nav>

        <div class="bg-white p-6 rounded shadow-md mt-6">
            <form action="{{ route('songs.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-gray-700">Title:</label>
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

                <div class="mb-4">
                    <label for="albums" class="block text-gray-700">Albums:</label>
                    <select name="albums[]" multiple class="w-full px-3 py-2 border rounded">
                        @foreach ($albums as $album)
                            <option value="{{ $album->id }}">
                                {{ $album->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('albums')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded">Create</button>
            </form><br><br>
            <div>
                <h1>Search a song via API:</h1><br>
            
                <form action="{{ route('songs.create')}}" method="GET">
                    @csrf
                    <label for="search" class="block text-gray-700">Search by name:</label>
                    <input type="text" name="title" class="w-full px-3 py-2 border rounded">
                    <button type="submit">Find</button>                    
                </form>

                <div>
                    <h1>Results:</h1>
                    <ul>
                       @foreach ($songsFromAPI as $songFromAPI)

                          <form action="{{ route('songs.index') }}" method="POST">
                            @csrf
                       <input type="text" name="title" value="{{ $songFromAPI["name"] }}">

                       <input type="text" name="artist" value="{{ $songFromAPI["artist"] }}">


                       <button type="submit">Add</button>
                          </form>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>

    </div>
</body>

</html>
