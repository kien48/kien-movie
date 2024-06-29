<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  Catelogue extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten',
        'slug'
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_catelogue');
    }
}
