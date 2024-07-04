<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\adminNotification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MemberUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $demTong = User::query()->where('role', 'member')->count();
        $demKhoa = User::query()->where('role', 'member')->where('is_active',1)->count();
        $demSpam = User::query()->where('role', 'member')->where('is_spam',1)->count();
        $demVip = User::query()->where('role', 'member')->where('is_vip',1)->count();
        $data = User::query()->with('coin')->where('role', 'member')->latest('id')->get();
        return view('admin.auth.members.index',compact('data','demTong','demKhoa','demSpam','demVip'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function transactions(int $id)
    {
        $data = DB::table('transaction_histories')->where('user_id',$id)->latest('id')->get();
        return view('admin.auth.members.transaction',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function khoaTaiKhoan(int $id)
    {
        User::query()->where('id',$id)->update(['is_active'=>1]);
        return back()->with('error','đã khoá thành công');
    }
    public function moKhoaTaiKhoan(int $id)
    {
        User::query()->where('id',$id)->update(['is_active'=>0]);
        return back()->with('error','đã mở thành công');
    }
    public function thongBao(int $id)
    {
        $iduser = $id;
        $user = User::query()->where('id',$iduser)->first();
        return view('admin.auth.members.adminNotification',compact('user'));
    }

    public function guiThongBao(Request $request)
    {
        $data = $request->all();
        adminNotification::query()->create($data);
    }

    public function apiHienDanhSachThongBao(int $id)
    {
        $data = adminNotification::query()->where('user_id',$id)->orderByDesc('id')->get();
        $json = [
            'status'=>true,
            'data'=>$data
        ];
        return response()->json($json, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
