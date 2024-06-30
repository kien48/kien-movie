<?php

namespace App\Http\Controllers;

use App\Models\Catelogue;
use App\Models\Episode;
use App\Models\Lists;
use App\Models\Movie;
use App\Models\MovieCatelogue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Movie::query()->get();
        $dataLists = Lists::query()->get();
        $dataCatelogues = Catelogue::query()->get();
        $dataMovieCateloge = DB::table('movie_catelogue')->get();
//        dd($dataMovieCateloge);
        $json = [
            'status' => true,
            'msg'=>'thành công',
            'data' => $data,
            'dataLists' => $dataLists,
            'dataCatelogues' => $dataCatelogues,
            'dataMovieCateloge' => $dataMovieCateloge
        ];
        return response()->json($json,200);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function apiTapPhim(int $id,int $tap)
    {
        $data = Episode::where('movie_id', $id)->where('tap', $tap)->first();
        $tap = $data->tap;
        $luotXem = $data->luot_xem;
        $json = [
            'status'=>true,
            'tap'=>$tap,
            'luot_xem'=>$luotXem
        ];
        return response()->json($json,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Episode::where('movie_id', $data['movie_id'])->where('tap', $data['tap'])->increment('luot_xem',1);
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
        //
    }
}
