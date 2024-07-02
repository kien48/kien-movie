<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CateloguePost;
use App\Models\Post;
use App\Models\TagPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = "admin.posts.";
    const PATH_UPLOAD = "post";
    public function index()
    {
        //
        $data = Post::query()->with(['user','catelogue'])->latest('id')->get();
        return view(self::PATH_VIEW.__FUNCTION__,compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $dataTags = TagPost::query()->get();
        $dataCateloguePost = CateloguePost::query()->get();
        return view(self::PATH_VIEW.__FUNCTION__,compact('dataTags','dataCateloguePost'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'tieu_de'=>"required|max:255|string",
            'catelogue_post_id'=>'required',
            'tag'=>'required',
            'noi_dung'=>'required'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $dataPost = $request->except('tag');
        $dataPost['user_id'] = session('admin')->id;
        $dataPost['slug'] = \Str::slug($dataPost['tieu_de']);
        $dataTag = $request->tag;
        try {
            DB::beginTransaction();
            // Tạo bài viết
            if ($request->hasFile('anh')){
                $dataPost['anh'] = Storage::put(self::PATH_UPLOAD, $request->file('anh'));
            }
            $post = Post::create($dataPost);

            // Gắn tag cho bài viết
            if (!empty($dataTag)) {
                $post->tags()->sync($dataTag);
            }

            DB::commit();
            return redirect()->route('admin.posts.index')->with('success', 'Thêm bài viết thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error','Lỗi rồi'.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $model = Post::query()->with('tags')->find($post)->toArray();
        $dataTags = TagPost::query()->get();
        $dataCateloguePost = CateloguePost::query()->get();
        return view(self::PATH_VIEW.__FUNCTION__,compact('dataTags','dataCateloguePost','model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validator = Validator::make($request->all(),[
            'tieu_de'=>"required|max:255|string",
            'catelogue_post_id'=>'required',
            'tag'=>'required',
            'noi_dung'=>'required'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $model = Post::query()->with('tags')->find($post)->toArray();
        $dataPost = $request->except('tag');
        $dataPost['user_id'] = Auth::user()->id;
        $dataPost['slug'] = \Str::slug($dataPost['tieu_de']);
        $dataTag = $request->tag;
        try {
            DB::beginTransaction();
            if ($request->hasFile('anh')) {
                $dataPost['anh'] = Storage::put(self::PATH_UPLOAD, $request->file('anh'));
            }
            $post->update($dataPost);

            if (!empty($dataTag)) {
                $post->tags()->sync($dataTag);
            }

            DB::commit();

            if( $request->hasFile('anh') && $model[0]['anh'] && Storage::exists($model[0]['anh'])){
                Storage::delete($model[0]['anh']);
            }
            return back()->with('success','Cập nhật thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error','Lỗi rồi'.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        try {
            DB::beginTransaction();
            $post->tags()->sync([]);
            $post->delete();
            DB::commit();
            return back()->with('success','Xóa thành công');
        }catch (\Exception $e){
            DB::rollBack();
            return back()->with('error','Lỗi rồi'. $e->getMessage());
        }
    }
}
