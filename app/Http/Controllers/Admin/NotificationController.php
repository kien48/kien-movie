<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Carbon;
=======
>>>>>>> d2f0dcd2c6396b166729b6b65ace749cc252128c

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
<<<<<<< HEAD
    public function apiDanhSachBaoLoi()
    {
        $data = Notification::query()->with(['user','movie'])->where('trang_thai','Chưa fix')->orderByDesc('id')->get();
        $json = [
            'status'=>true,
            'data'=>$data
        ];
        return response()->json($json,200);
    }

    public function index()
    {
        return view('admin.notifications.index');
    }
    public function apiDemThongBaoLoiChuaFix()
    {
        $data = Notification::query()->where('trang_thai','Chưa fix')->count();
        $json = [
            'status'=>true,
            'data'=>$data
        ];
        return response()->json($json,200);
    }
=======


    public function apiDemThongBaoLoiChuaFix()
    {
        $count = Notification::query()->where('trang_thai','Chưa fix')->count();
        $json = [
          'status'=>true,
          'data'=>$count
        ];
        return response()->json($json,200);
    }
    public function index()
    {
        //
    }

>>>>>>> d2f0dcd2c6396b166729b6b65ace749cc252128c
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        $data = $request->all();
        Notification::query()->where('id',$data['id'])->update(['trang_thai'=>$data['trang_thai']]);
=======

>>>>>>> d2f0dcd2c6396b166729b6b65ace749cc252128c
    }

    /**
     * Display the specified resource.
     */
<<<<<<< HEAD
//    public function spamUser()
//    {
//        $ngayHomNay = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
//        $userBaoLoi = Notification::query()->select('user_id')->get();
//        if()
//    }
=======
    public function show(Notification $notification)
    {
        //
    }
>>>>>>> d2f0dcd2c6396b166729b6b65ace749cc252128c

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
