<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Show band</title>
</head>

<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <nav class="flex justify-between items-center py-4">
            <a href="{{ route('bands.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Home</a>
            <h1 class="text-2xl font-bold">band Details</h1>
        </nav>

        <div class="bg-white p-6 rounded shadow-md mt-6">

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name:</label>
                <input type="text" name="name" value="{{ $band->name }}" class="w-full px-3 py-2 border rounded"
                    readonly>
            </div>

            <div class="mb-4">
                <label for="genre" class="block text-gray-700">Genre:</label>
                <input type="text" name="genre" value="{{ $band->genre }}" class="w-full px-3 py-2 border rounded"
                    readonly>
            </div>

            <div class="mb-4">
                <label for="founded" class="block text-gray-700">Founded:</label>
                <input type="text" name="founded" value="{{ $band->founded }}" class="w-full px-3 py-2 border rounded"
                    readonly>
            </div>

            <div class="mb-4">
                <label for="active_till" class="block text-gray-700">Active till:</label>
                <input type="text" name="active_till" value="{{ $band->active_till }}" class="w-full px-3 py-2 border rounded"
                    readonly>
            </div>
           

            <div class="flex space-x-4 mt-4">
                <a href="{{ route('bands.edit', $band->id) }}"
                    class="bg-yellow-500 text-white py-2 px-4 rounded">Edit</a>
                <form action="{{ route('bands.destroy', $band->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded">Delete</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
