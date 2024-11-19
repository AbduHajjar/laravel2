<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = ['name', 'genre', 'founded', 'active_till'];

    /**
     * Get the albums that the band has.
     */

    public function albums()
    {
        return $this->hasMany(Album::class);
    }
}
