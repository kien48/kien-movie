<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_recharge extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "so_giao_dich",
        "xu",
        "phuong_thuc_thanh_toan",
        "tinh_trang_thanh_toan",
    ];
}
