<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\adminNotification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminNotificationController extends Controller
{
    const PATH_VIEW = "admin.adminNotification.";
    public function index()
    {
        $data = adminNotification::query()->with('user')->orderByDesc('id')->get();
        return view(self::PATH_VIEW.__FUNCTION__,compact('data'));
    }

    public function create()
    {
        return view(self::PATH_VIEW.__FUNCTION__);

    }
    public function store(Request $request)
    {
            if ($request->chon == 'all') {
                $users = User::pluck('id');
            } elseif ($request->chon == 'vip') {
                $users = User::where('is_vip', '1')->pluck('id');
            }

            foreach ($users as $userId) {
                adminNotification::create([
                    'user_id' => $userId,
                    'noi_dung' => $request->noi_dung
                ]);
            }
        }

}
