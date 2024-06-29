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
        $dataPost = $request->except('tag');
        $dataPost['user_id'] = Auth::user()->id;
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
            return redirect()->route('admin.posts.index')->with('success', 'Post created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Something went wrong, please try again: ' . $e->getMessage()]);
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
            return redirect()->route('admin.posts.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back();
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
            return back();
        }catch (\Exception $e){
            DB::rollBack();
            return back();
        }
    }
}
