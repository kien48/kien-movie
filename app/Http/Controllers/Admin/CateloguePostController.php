<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CateloguePost;
use App\Models\TagPost;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CateloguePostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = "admin.catelogue_posts.";
    public function index()
    {
        //
        $data = CateloguePost::query()->latest('id')->get();
        return view(self::PATH_VIEW.__FUNCTION__,compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        $data['slug'] = str::slug($data['ten']);
        CateloguePost::query()->create($data);
        return back()->with('success','Xóa thành công');


    }

    /**
     * Display the specified resource.
     */
    public function show(CateloguePost $cateloguePost)
    {
        //


//        $model = CateloguePost::query()
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CateloguePost $cateloguePost)
    {
        //
        $model = CateloguePost::query()->find($cateloguePost)->toArray();
        return view(self::PATH_VIEW.__FUNCTION__,compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CateloguePost $cateloguePost)
    {
        //
        $validator = Validator::make($request->all(),[

            'ten'=>'required|max:255|string'

        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();
        $data['slug'] = str::slug($data['ten']);
        $cateloguePost->update($data);
        return back()->with('success','Xóa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $dataCatePost = DB::table('posts')->where('catelogue_post_id',$id)->count();
        if($dataCatePost == null){
           CateloguePost::query()->where('id',$id)->delete();
            return  back()->with('success','Xóa thành công');
        }else{
            return back()->with('error','Có bài viết đang liên kết với danh mục này không thể xóa');
        }
    }
}
