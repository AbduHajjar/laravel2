<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['title', 'singer'];

    /**
     * Get the albums that the song belongs to.
     */

    public function albums()
    {
        return $this->belongsToMany(Album::class);
    }
}
