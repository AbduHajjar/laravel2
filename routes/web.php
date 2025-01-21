<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/songs', [SongController::class, 'index'])->name('songs.index');
Route::get('/songs/create', [SongController::class, 'create'])->name('songs.create')->middleware('auth');
Route::post('/songs', [SongController::class, 'store'])->name('songs.store')->middleware('auth');
Route::get('/songs/{song}', [SongController::class, 'show'])->name('songs.show');
Route::get('/songs/{song}/edit', [SongController::class, 'edit'])->name('songs.edit')->middleware('auth');
Route::patch('/songs/{song}', [SongController::class, 'update'])->name('songs.update')->middleware('auth');
Route::delete('/songs/{song}', [SongController::class, 'destroy'])->name('songs.destroy')->middleware('auth');

Route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');
Route::get('/albums/create', [AlbumController::class, 'create'])->name('albums.create')->middleware('auth');
Route::post('/albums', [AlbumController::class, 'store'])->name('albums.store')->middleware('auth');
Route::get('/albums/{album}', [AlbumController::class, 'show'])->name('albums.show');
Route::get('/albums/{album}/edit', [AlbumController::class, 'edit'])->name('albums.edit')->middleware('auth');
Route::patch('/albums/{album}', [AlbumController::class, 'update'])->name('albums.update')->middleware('auth');
Route::delete('/albums/{album}', [AlbumController::class, 'destroy'])->name('albums.destroy')->middleware('auth');
Route::delete('/albums/{album}/songs/{song}', [AlbumController::class, 'detachSong'])->name('albums.songs.detach')->middleware('auth');
Route::post('/albums/{album}/songs/{song}', [AlbumController::class, 'attachSong'])->name('albums.songs.attach')->middleware('auth');

Route::get('/bands', [BandController::class, 'index'])->name('bands.index');
Route::get('/bands/create', [BandController::class, 'create'])->name('bands.create')->middleware('auth');
Route::post('/bands', [BandController::class, 'store'])->name('bands.store')->middleware('auth');
Route::get('/bands/{band}', [BandController::class, 'show'])->name('bands.show');
Route::get('/bands/{band}/edit', [BandController::class, 'edit'])->name('bands.edit')->middleware('auth');
Route::patch('/bands/{band}', [BandController::class, 'update'])->name('bands.update')->middleware('auth');
Route::delete('/bands/{band}', [BandController::class, 'destroy'])->name('bands.destroy')->middleware('auth');