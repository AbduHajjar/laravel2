<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Band;
use Illuminate\Http\Request;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bands = Band::all();
        return view('bands.index', ['bands' => $bands]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData =  $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            // 'founded' => 'required|integer|digits:4|min:1900|max' . date('Y'),
            'founded' => 'required|integer|digits:4',
            // 'active_till' => 'nullable|integer|digits:4'|'min:1900|max' . date('Y'),
            'active_till' => 'nullable|integer|digits:4',
        ]);

        Band::create($validatedData);
        return redirect()->route('bands.index')->with('success', 'Band created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $band = Band::findOrFail($id);
        return view('bands.show', ['band' => $band]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $band = Band::findOrFail($id);
        return view('bands.edit', ['band' => $band]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
             // 'founded' => 'required|integer|digits:4|min:1900|max' . date('Y'),
            'founded' => 'required|integer|digits:4',
            // 'active_till' => 'nullable|integer|digits:4'|'min:1900|max' . date('Y'),
            'active_till' => 'nullable|integer|digits:4',
        ]);

        Band::findOrFail($id)->update($validatedData);
        return redirect()->route('bands.index')->with('success', 'Band updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Band::findOrFail($id)->delete();
        return redirect()->route('bands.index')->with('success', 'Band deleted successfully.');
    }
}
