<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable =[
      'user_id',
      'movie_id',
      'tap',
      'noi_dung'
    ];
<<<<<<< HEAD

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
=======
>>>>>>> d2f0dcd2c6396b166729b6b65ace749cc252128c
}
