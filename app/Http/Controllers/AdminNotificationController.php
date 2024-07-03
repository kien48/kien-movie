<?php

namespace App\Http\Controllers;

use App\Models\adminNotification;
use Illuminate\Http\Request;

class AdminNotificationController extends Controller
{
    public function apiHienThiThongBaoTheoUser(int $id)
    {
        $data = adminNotification::query()->where('user_id',$id)->orderByDesc('id')->get();
        $json = [
            'status'=>true,
            'data'=>$data
        ];
        return response()->json($json,200);
    }
}
