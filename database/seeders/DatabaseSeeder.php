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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

       // User::factory(10)->create();
       Band::factory(10)->create();
       Album::factory(10)->create();
       Song::factory(10)->create();

       // attach songs to albums and albums to songs
       $albums = Album::all();
       $songs = Song::all();
       $albums->each(function ($album) use ($songs) {
           $album->songs()->attach(
               $songs->random(rand(1, 5))->pluck('id')->toArray()
           );
       });
    }
}
