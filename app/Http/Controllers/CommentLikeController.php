<?php

namespace App\Http\Controllers;

use App\Models\CommentLike;
use App\Models\UserMovieLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentLikeController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        CommentLike::create($data);
    }
    public function apiUserCommentLike(int $comment_id )
    {
        $data = CommentLike::where('user_id', Auth::user()->id)
            ->where('comment_id', $comment_id)->first();
        if ($data) {
            $json = [
                'status' => true,
            ];
        } else {
            $json = [
                'status' => false,
            ];
        }
        return response()->json($json, 200);
    }
    /**
     * Display the specified resource.
     */
    public function show(CommentLike $commentLike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommentLike $commentLike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommentLike $commentLike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function disLike(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        CommentLike::where($data)->delete();
    }


}
