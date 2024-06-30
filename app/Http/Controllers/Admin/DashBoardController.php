<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Episode;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashBoardController extends Controller
{
    public function index()
    {
        $tongPhim = Movie::query()->count();
        $startOfWeek = Carbon::now()->startOfWeek(); // Ngày đầu tuần
        $endOfWeek = Carbon::now()->endOfWeek(); // Ngày cuối tuần
        $phimMoiTuan = Movie::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
        $tongLuotXem = Episode::query()->select('luot_xem')->sum('luot_xem');
        $thanhVienDangKyTuanNay = User::query()->whereBetween('created_at',[$startOfWeek, $endOfWeek])->where('role','Member')->count();
        $adminDangKyTuanNay = User::query()->whereBetween('created_at',[$startOfWeek, $endOfWeek])->where('role','Admin')->count();
        $tongBinhLuan = Comment::query()->count();
        return view('admin.dashboard',compact('tongPhim','phimMoiTuan','tongLuotXem','thanhVienDangKyTuanNay','tongBinhLuan','adminDangKyTuanNay'));
    }
}