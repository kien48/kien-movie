<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::query()->where('role', 'admin')->latest('id')->get();
        return view('admin.auth.admins.index',compact('data'));
    }

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
        //
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

    public function showFormLogin()
    {
        return view('admin.auth.login');
    }
    public function login(Request $request)
    {
        $data = $request->all();
        $user = User::query()->where('email',$data['email'])->where('role','admin')->first();
        if($user == null){
           return back()->with('error', 'Bạn không có quyền truy cập');
        }else{
            $usersuccsess = User::query()->where('email',$data['email'])->first();
            session(['admin' => $usersuccsess]);
            return redirect()->route('admin.home');
        }
    }
    public function logout()
    {
        session()->forget('admin');
        return redirect()->route('admin.login');
    }
}
