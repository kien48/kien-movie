<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catelogue;
use App\Models\TagPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TagPostController extends Controller
{
const PATH_VIEW = "admin.tagpost.";
    public function index()
    {
        $data = TagPost::query()->orderByDesc('id')->get();
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
        //
        $validator = Validator::make($request->all(),
            [
                'ten' => 'required|string|max:255'
            ]
        );

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $ten = $data['ten'];
        $data['slug'] =  \Illuminate\Support\Str::slug($ten);
        TagPost::query()->create($data);
        return back()->with('success','Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view(self::PATH_VIEW.__FUNCTION__);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = TagPost::query()->find($id);
        return view(self::PATH_VIEW.__FUNCTION__,compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),
            [
                'ten' => 'required|string|max:255'
            ]
        );

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->except('_token','_method');
        $ten = $data['ten'];
        $data['slug'] =  \Illuminate\Support\Str::slug($ten);
        TagPost::query()->where('id',$id)->update($data);
        return back()->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataMovie = DB::table('post_tagpost')->where('tag_post_id',$id)->count();
        if($dataMovie == null){
            TagPost::query()->where('id',$id)->delete();
            return  back()->with('success','Xóa thành công');
        }else{
            return back()->with('error','Có bài viết đang liên kết với tag này không thể xóa');
        }
    }
}
