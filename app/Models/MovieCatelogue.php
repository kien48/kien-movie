<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieCatelogue extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'catelogue_id',
    ];
}
