<?php

namespace App\Http\Controllers;

use App\Models\CateloguePost;
use App\Models\Post;
use App\Models\TagPost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        $postNew = Post::query()->latest('id')->limit(8)->get();
        return view('blogs.new',compact('postNew'));
    }
    public function detail(string $slug)
    {
        $model = Post::query()->with(['catelogue','user','tags'])->where('slug',$slug)->firstOrFail();
        $tags = $model->tags->toArray();
        $cate = $model->catelogue->toArray();
        return view('blogs.detail',compact('model','tags','cate'));
    }
}
