<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'truoc_giao_dich',
        'sau_giao_dich',
        'bien_dong_so_du',
        'mo_ta',
        'ngay_tao'
    ];
}
