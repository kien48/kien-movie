<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'user_id',
        'content',
        'sao'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
    public function movie()
    {
        return $this->belongsTo(\App\Models\Movie::class);
    }
    public function commentLike()
    {
        return $this->hasMany(CommentLike::class);
    }
}
