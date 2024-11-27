<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = ['name', 'year', 'times_sold', 'band_id'];

    /**
     * Get the band that the album belongs to.
     */

     public function band()
     {
         return $this->belongsTo(Band::class);
     }
   
     /**
     * Get the songs that the album belongs to.
     */

    public function songs()
    {
        return $this->belongsToMany(Song::class);
    }
}
