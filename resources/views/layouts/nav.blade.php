<nav class="bg-gray-500 p-4 mb-6">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="text-white text-lg font-semibold">Music Management</a>
        
        <ul class="flex space-x-4">
            <li>
                <a href="{{ route('albums.index') }}" class="text-gray-300 hover:text-white">Albums</a>
            </li>
            <li>
                <a href="{{ route('bands.index') }}" class="text-gray-300 hover:text-white">Bands</a>
            </li>
            <li>
                <a href="{{ route('songs.index') }}" class="text-gray-300 hover:text-white">Songs</a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}" class="text-gray-300 hover:text-white">Dashboard</a>
            </li>
        </ul>
    </div>
</nav>
