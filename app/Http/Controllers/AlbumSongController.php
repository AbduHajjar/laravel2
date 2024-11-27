<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Song;
use Illuminate\Http\Request;

class AlbumSongController extends Controller
{
    //

    public function store(Album $album, Song $song)
    {
        $album->songs()->attach($song->id);
        return redirect()->route('albums.show', $album->id)->with('success', 'Song added to album successfully.');
    }

    public function destroy(Album $album, Song $song)
    {
        $album->songs()->detach($song->id);
        return redirect()->route('albums.show', $album->id)->with('success', 'Song removed from album successfully.');
    }
}
