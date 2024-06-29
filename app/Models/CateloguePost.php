<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CateloguePost extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten',
        'slug'
    ];
}
