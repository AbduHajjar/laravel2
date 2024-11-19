<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Band;
use App\Models\Song;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 5 band records using the Band factory
        $bands = Band::factory(5)->create();
        
        // Iterate over each created band
        $bands->each(function ($band) {
            // Create 3 album records for each band using the Album factory
            $albums = Album::factory(3)->create([
                'band_id' => $band->id, // Set the band_id for each album to the current band's id
            ]);
        
            // Iterate over each created album
            $albums->each(function ($album) {
                // Create 5 song records using the Song factory
                $songs = Song::factory(5)->create();
                // Attach the created songs to the current album
                $album->songs()->attach($songs);
            });
        });
        
    }
}
