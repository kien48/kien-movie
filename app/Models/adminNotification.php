<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adminNotification extends Model
{
    use HasFactory;
    protected $fillable = [
       'user_id',
        'noi_dung',
    ];
}
