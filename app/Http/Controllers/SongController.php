<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Song::all();
        return view('songs.index', ['songs' => $songs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $albums = Album::all();
        

        $songsFromAPI = [];
        if ($request->query->has('title')) //check if a title is being searched
        {
            $api_key = '14eb96764d1393a7df136660bff9c2b9'; //last.fm api key
            $title = $request->query('title');  //get the title from the query string
            $response = Http::get(
                'http://ws.audioscrobbler.com/2.0/?method=track.search&track=' .
                    $title . '&api_key=' . $api_key . '&format=json'
            )->json(); //make the api call and get the response
            $songsFromAPI = $response["results"]["trackmatches"]["track"]; //get the tracks from the response
                // dd($songsFromAPI);
        }

        return view('songs.create', ['albums' => $albums], ['songsFromAPI' => $songsFromAPI]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        /* Explanation:

            Validation: The request data is validated and stored in the $validatedData array.
            Data Insertion: The validated data array is directly passed to the Song::create() method.
            Redirect: The user is redirected to the songs.index route with a success message.
            Key Point: This approach is straightforward and uses the $validatedData array directly, which is a clean and secure way to ensure only validated data is inserted.*/
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'singer' => 'nullable|string|max:255',
            'albums' => 'nullable|array',
            'albums.*' => 'exists:albums,id'

        ]);
        $song = Song::create($validatedData);
        if ($request->has('albums')) {
            $song->albums()->attach($request->albums);
        }
        return redirect()->route('songs.index')->with('success', 'Song created successfully.');

        /*
            Explanation:

            Validation: Similar validation process as the first approach.
            Data Insertion: Instead of passing the entire $validatedData array to the create() method, individual request parameters are passed explicitly.
            Redirect: The user is redirected to the songs.index route with a success message.
            Key Point: This approach provides more control over the fields being inserted into the database. While this might seem redundant, it can be useful if you need to manipulate the data or include additional logic before insertion.

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'singer' => 'string|max:255',
        ]);

        Song::create([
            'title' => $request->title,
            'singer' => $request->singer
        ]);

        return redirect()->route('songs.index')->with('success', 'Song created successfully.');
      */


        /*

            Explanation:

            Validation: Similar validation process as the other approaches.
            Data Insertion: Uses $request->only(['title', 'singer']) to extract only the specified fields from the request and pass them to the create() method.
            Redirect: The user is redirected to the songs.index route with a success message.
            Key Point: This approach ensures that only the title and singer fields are extracted from the request, preventing any other data from being accidentally included in the insertion. It's a concise and secure way to handle specific fields.


        $validatedData = $request->validate([
          'title' => 'required|string|max:255',
          'singer' => 'string|max:255',
       ]);

       Song::create($request->only(['title', 'singer']));

        return redirect()->route('songs.index')->with('success', 'Song created successfully.');
*/
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $song = Song::with('albums')->findOrFail($id);        // find can be translated below:
        // Song::where('id', '=', $id)->first();

        //  fail can be translated below:
        // SELECT * FROM `songs` WHERE id = $id LIMIT 1;

        // Geeft dit niks terug, dan geef een 404 error

        return view('songs.show', ['song' => $song]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $song = Song::findOrFail($id);
        return view('songs.edit', ['song' => $song]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'singer' => 'nullable|string|max:255',
        ]);

        // Find the song by its ID and update it with the validated data
        Song::findOrFail($id)->update($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('songs.index')->with('success', 'Song updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the song by its ID and delete it
        Song::destroy($id);

        // Redirect to the index page with a success message
        return redirect()->route('songs.index')->with('success', 'Song deleted successfully.');
    }
}
