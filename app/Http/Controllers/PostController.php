<?php

namespace App\Http\Controllers;

use App\Models\CateloguePost;
use App\Models\Post;
use App\Models\TagPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {

        $postNew = Post::query()->where('catelogue_post_id','!=',3)->latest('id')->limit(8)->get();
        return view('blogs.new',compact('postNew'));
    }
    public function detail(string $slug)
    {
        $model = Post::query()->with(['catelogue','user','tags'])->where('slug',$slug)->firstOrFail();
        $tags = $model->tags->toArray();
        $cate = $model->catelogue->toArray();
        return view('blogs.detail',compact('model','tags','cate'));
    }

    public function catelogue(int $id)
    {
        $data = Post::query()->with('catelogue')->where('catelogue_post_id',$id)->orderByDesc('id')->get();
        return view('blogs.catelogue',compact('data'));
    }

    public function tag(int $id,Request $request)
    {
        $dataTags = DB::table('post_tagpost')->where('tag_post_id',$id)->get();
        $dataPosts = [];
        foreach ($dataTags as $tag){
            $dataPosts[] = Post::query()->where('id',$tag->post_id)->orderByDesc('id')->get();
        }
        $url = $request->url();
        $segments = explode('/', $url);
        $end = end($segments);

        return view('blogs.tag',compact('dataPosts','end'));
    }

    public function themLuotXem(Request $request)
    {
        $data = $request->all();
        Post::where('id', $data['id'])->increment('luot_xem',1);
    }

    public function apiLuotXemBaiViet(int $id)
    {
        $data = Post::select('luot_xem')->where('id', $id)->first();

        if(!$data) {
            $json = [
                "status" => true,
                "data" => 0
            ];
        } else {
            $json = [
                "status" => true,
                "data" => $data->luot_xem
            ];
        }

        return response()->json($json,200);
    }
}
