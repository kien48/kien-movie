<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    public function edit()
    {
        return view('auth.edit');
    }

    public function update(Request $request)
    {
        $data = $request->all();

        $currentUser = Auth::user();

        // Kiểm tra email đã tồn tại nhưng không phải của người dùng hiện tại
        $emailExists = User::query()
            ->where('email', $data['email'])
            ->where('id', '!=', $currentUser->id)
            ->exists();

        $nameExists = User::query()
            ->where('name', $data['ten'])
            ->where('id', '!=', $currentUser->id)
            ->exists();

        if ($emailExists && $nameExists) {
            return back()->withErrors('Đã có tài khoản đăng ký email và tên này');
        } elseif ($emailExists) {
            return back()->withErrors('Đã có tài khoản đăng ký email này');
        } elseif ($nameExists) {
            return back()->withErrors('Đã có tài khoản đăng ký tên này');
        }

        $currentUser->email = $data['email'];
        $currentUser->name = $data['ten'];
        $currentUser->save();

        // Trả về thông báo thành công
        return back()->with('success', 'Cập nhật thông tin thành công');
    }

}
