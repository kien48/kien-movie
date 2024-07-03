<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fundTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
'bien_dong_so_du',
'mo_ta',
'truoc_giao_dich',
'sau_giao_dich',
    ];
}
