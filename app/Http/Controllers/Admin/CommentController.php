<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin.comment.';
    public function index()
    {
        $data = Comment::query()->with(['user','movie'])->orderByDesc('id')->get();
        return view(self::PATH_VIEW.__FUNCTION__,compact('data'));
    }
    public function thongKe()
    {
        $data = Comment::query()
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->join('movies', 'comments.movie_id', '=', 'movies.id')
            ->select('users.id as user_id','users.name as user_name',
                DB::raw('count(comments.content) as count'), DB::raw('AVG(comments.sao) as avg_sao'))
            ->groupBy('users.id')->orderByDesc('count')
            ->get();
        return view(self::PATH_VIEW.__FUNCTION__,compact('data'));
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
        Comment::query()->where('id',$id)->delete();
        return back()->with('success','xóa thành công');
    }
}
