<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Band;
use App\Models\Song;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::all();
        return view('albums.index', ['albums' => $albums]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bands = Band::all();
        return view('albums.create', ['bands' => $bands]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            // 'year' => 'required|integer|digits:4|min:1900|max:' . date("Y"),
            'year' => 'required|integer|digits:4',
            'times_sold' => 'required|integer',
            'band_id' => 'required|exists:bands,id'

        ]);
        Album::create($request->all());
        return redirect()->route('albums.index')->with('success', 'Album created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // show the album details including the band details and the songs in the album
        $album = Album::with(['band', 'songs'])->findOrFail($id);
        return view('albums.show', ['album' => $album]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $album = Album::findOrFail($id);
        $bands = Band::all();
        // Retrieve only songs not attached to the album
        $albumSongs = $album->songs->pluck('id')->toArray();
        $songs = Song::whereNotIn('id', $albumSongs)->get();
        return view('albums.edit', ['album' => $album, 'bands' => $bands, 'songs' => $songs]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            // 'year' => 'required|integer|digits:4|min:1900|max:' . date("Y"),
            'year' => 'required|integer|digits:4',
            'times_sold' => 'required|integer',
            'band_id' => 'required|exists:bands,id'
        ]);

        Album::findOrFail($id)->update($request->all());
        return redirect()->route('albums.index')->with('success', 'Album updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Album::findOrFail($id)->delete();
        return redirect()->route('albums.index')->with('success', 'Album deleted successfully.');
    }

    public function attachSong($albumId, $songId)
    {
        $album = Album::findOrFail($albumId);
        $song = Song::findOrFail($songId);
        // Attach the song to the album
        $album->songs()->attach($song->id);

        return redirect()->route('albums.edit', $albumId)->with('success', 'Song detached successfully.');
    }

    /**
     * Detach a song from the album.
     */
    public function detachSong($albumId, $songId)
    {
        // This should trigger when detaching any song, including the first one
        // dd('Detaching Song:', 'Album ID:', $albumId, 'Song ID:', $songId);

        $album = Album::findOrFail($albumId);
        $album->songs()->detach($songId);

        return redirect()->route('albums.edit', $albumId)->with('success', 'Song detached successfully.');
    }
}
