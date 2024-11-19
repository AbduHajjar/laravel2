<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Bands Index</title>
</head>

<body class="bg-gray-100 p-6">
    @include('layouts.nav')
    <div class="container mx-auto">
        <nav class="flex justify-between items-center py-4">
            <h1 class="text-2xl font-bold">Bands Management</h1>
            <a href="{{ route('bands.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Create New Band</a>
        </nav>

        <div class="bg-white p-6 rounded shadow-md mt-6">
            <h2 class="text-xl font-semibold mb-4">Bands List</h2>
            <ul class="divide-y divide-gray-200">
                @foreach ($bands as $band)
                    <li class="flex justify-between items-center py-4">
                        <div>
                            <a href="{{ route('bands.show', $band->id) }}" class="text-blue-600 hover:underline">
                                {{ $band->name }}
                            </a>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('bands.show', $band->id) }}"
                                class="bg-green-500 text-white py-1 px-3 rounded">Show</a>
                            <a href="{{ route('bands.edit', $band->id) }}"
                                class="bg-yellow-500 text-white py-1 px-3 rounded">Edit</a>
                            <form action="{{ route('bands.destroy', $band->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this band?');">
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
