<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Edit Album</title>
</head>

<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <nav class="flex justify-between items-center py-4">
            <a href="{{ route('albums.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Home</a>
            <h1 class="text-2xl font-bold">Edit Album</h1>
        </nav>

        <div class="bg-white p-6 rounded shadow-md mt-6">
            <form action="{{ route('albums.update', $album->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name:</label>
                    <input type="text" name="name" value="{{ $album->name }}"
                        class="w-full px-3 py-2 border rounded" value="{{ old('name') }}">
                    @error('name')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="year" class="block text-gray-700">Year:</label>
                    <input type="text" maxlength="4" name="year" value="{{ $album->year }}"
                        class="w-full px-3 py-2 border rounded" value="{{ old('year') }}">
                    @error('year')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="times_sold" class="block text-gray-700">Times Sold:</label>
                    <input type="text" name="times_sold" value="{{ $album->times_sold }}"
                        class="w-full px-3 py-2 border rounded" value="{{ old('times_sold') }}">
                    @error('times_sold')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="band" class="block text-gray-700">Band:</label>
                    <select name="band_id" class="w-full px-3 py-2 border rounded">
                        @foreach ($bands as $band)
                            <option value = "{{ $band->id }}"
                                {{ $band->id == $album->band_id ? 'selected' : '' }}>{{ $band->name }}</option>
                        @endforeach
                    </select>
                    @error('band_id')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- List of Attached Songs with Detach Option -->
                <div class="mb-4">
                    <label for="songs" class="block text-gray-700">Attached Songs:</label>
                    <ul class="divide-y divide-gray-200">
                        @foreach ($album->songs as $index => $song)
                            <li class="flex justify-between items-center py-2">
                                {{ $song->title }}
                                <form
                                    action="{{ route('albums.songs.detach', ['album' => $album->id, 'song' => $song->id]) }}"
                                    method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="bg-red-500 text-white py-1 px-2 rounded">Detach</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>



                <!-- List of Available Songs with Attach Option -->
                <div class="mb-4">
                    <label for="songs" class="block text-gray-700">Available Songs:</label>
                    <ul class="divide-y divide-gray-200">
                        @foreach ($songs as $song)
                            <li class="flex justify-between items-center py-2">
                                {{ $song->title }}
                                <form action="{{ route('albums.songs.attach', $album->id) }}" method="POST">
                                    @csrf
                                    <!-- Hidden input for song_id -->
                                    <input type="hidden" name="song_id" value="{{ $song->id }}">
                                    <button type="submit"
                                        class="bg-green-500 text-white py-1 px-2 rounded">Attach</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>


                <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded">Update</button>
            </form>


        </div>


    </div>
</body>

</html>
