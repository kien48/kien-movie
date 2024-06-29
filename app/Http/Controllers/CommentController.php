<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(string $id)
    {
        //
        $data = Comment::where('movie_id', $id)->latest()->get();
        $json = [
            'status' => true,
            'msg'=>'thanh cong!',
            'data' => $data
        ];

        return response()->json($json,200);
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
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->name = $request->name;
        $comment->movie_id = $request->movie_id;
        $comment->save();
        $data = Comment::where('movie_id', $comment->movie_id)->latest()->get();
        $json = [
            'status' => true,
            'msg'=>'thanh cong!',
            'data' => $data
        ];

        return response()->json($json,200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
