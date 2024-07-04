<?php

namespace App\Http\Controllers;

use App\Models\adminNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminNotificationController extends Controller
{
    public function apiHienThiThongBaoTheoUser()
    {
        $data = adminNotification::query()->where('user_id',Auth::user()->id)->where('trang_thai','Chưa đọc')->orderByDesc('id')->get();
        $json = [
            'status'=>true,
            'data'=>$data
        ];
        return response()->json($json,200);
    }

    public function daDoc(Request $request)
    {
        $data = $request->all();
        adminNotification::query()->where('id',$data['id'])->update([
            'trang_thai'=>'Đã đọc'
        ]);
        $dataChuaDoc = adminNotification::query()->where('user_id',Auth::user()->id)->where('trang_thai','Chưa đọc')->orderByDesc('id')->count();
        $json = [
            'status'=>true,
            'data'=>$dataChuaDoc
        ];
        return response()->json($json,200);
    }
}
