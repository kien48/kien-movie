<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(SettingController $settingController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SettingController $settingController)
    {
        $data = Setting::query()->select(['banner_video','tieu_de','noi_dung','id'])->get();
        return view('admin.setting',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $model = Setting::query()->select(['banner_video','tieu_de','noi_dung'])->get();
        $data = $request->except('banner_video','_token','_method');
        if($request->hasFile('banner_video')){
            $data['banner_video'] = Storage::put('settings', $request->file('banner_video'));
        }
        $setting = Setting::query()->where('id',$id)->update($data);
        if( $request->hasFile('banner_video') && $model[0]->banner_video && Storage::exists($model[0]->banner_video)){
            Storage::delete($model[0]->banner_video);
        }
        if ($setting) {
            return redirect()->back()->with('success', 'Cập nhật thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SettingController $settingController)
    {
        //
    }
}
