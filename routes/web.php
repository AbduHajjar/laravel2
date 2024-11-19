<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;



// Route::resource('songs', SongController::class);


//albums routes
Route::get('/', [AlbumController::class, 'index'])->name('albums.index');
Route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');
Route::get('/albums/create', [AlbumController::class, 'create'])->name('albums.create');
Route::post('/albums', [AlbumController::class, 'store'])->name('albums.store');
Route::get('/albums/{album}', [AlbumController::class, 'show'])->name('albums.show');
Route::get('/albums/{album}/edit', [AlbumController::class, 'edit'])->name('albums.edit');
Route::put('/albums/{album}', [AlbumController::class, 'update'])->name('albums.update');
Route::delete('/albums/{album}', [AlbumController::class, 'destroy'])->name('albums.destroy');

//bands routes
Route::get('/bands', [BandController::class, 'index'])->name('bands.index');
Route::get('/bands/create', [BandController::class, 'create'])->name('bands.create');
Route::post('/bands', [BandController::class, 'store'])->name('bands.store');
Route::get('/bands/{band}', [BandController::class, 'show'])->name('bands.show');
Route::get('/bands/{band}/edit', [BandController::class, 'edit'])->name('bands.edit');
Route::put('/bands/{band}', [BandController::class, 'update'])->name('bands.update');
Route::delete('/bands/{band}', [BandController::class, 'destroy'])->name('bands.destroy');


//songs routes
// Route::get('/songs', [SongController::class, 'index'])->name('songs.index');
// Route::get('/songs/create', [SongController::class, 'create'])->name('songs.create');
// Route::post('/songs', [SongController::class, 'store'])->name('songs.store');
// Route::get('/songs/{song}', [SongController::class, 'show'])->name('songs.show');
// Route::get('/songs/{song}/edit', [SongController::class, 'edit'])->name('songs.edit');
// Route::put('/songs/{song}', [SongController::class, 'update'])->name('songs.update');
// Route::delete('/songs/{song}', [SongController::class, 'destroy'])->name('songs.destroy');

// Route::resource('songs', SongController::class)->except(['index', 'show'])->auth();
// Route::resource('songs', SongController::class)->only(['index', 'show']);

Route::resource('songs', SongController::class)->only(['index', 'show']);
