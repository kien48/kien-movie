<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    const PATH_VIEW = 'admin.auth.admins.';
    public function index()
    {
        $data = User::query()->where('role', 'admin')->latest('id')->get();
        return view(self::PATH_VIEW.__FUNCTION__,compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW.__FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "name"=>'required|max:255|string',
            "email"=>'email|required',
            "password"=>'min:8|required'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $data['name'] = "Admin ".$request->name;
        $data['password'] = bcrypt($request->password);
        $data['role'] = "admin";
        $user = User::query()->create($data);
        if($user){
            return back()->with('success','Tạo tài khoản thành công');
        }else{
            return back()->with('error','Tạo tài khoản thất bại');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = User::query()->where('id',$id)->get();
        return view(self::PATH_VIEW.__FUNCTION__,compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            "name"=>'required|max:255|string',
            "email"=>'email|required',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->except('_token','_method');
        $data['name'] = "Admin ".$request->name;
        $user = User::query()->where('id',$id)->update($data);
        if($user){
            return back()->with('success','Cập nhật tài khoản thành công');
        }else{
            return back()->with('error','Cập nhật tài khoản thất bại');
        }
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
