<?php

namespace App\Http\Controllers;

use App\Models\Catelogue;
use App\Models\Fund;
use App\Models\fundTransaction;
use App\Models\Lists;
use App\Models\Movie;
use App\Models\Setting;
use App\Models\User;
use App\Models\UserMovieLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPhimMoiThem = Movie::query()->with(['lists'])
            ->latest('id')
            ->take(12)
            ->get();
        $dataPhimLe = Movie::query()
            ->where('list_id', 1)
            ->latest('id')
            ->take(12)
            ->get();
        $dataPhimBo = Movie::query()
            ->where('list_id', 2)
            ->latest('id')
            ->take(12)
            ->get();
        $dataTvShows = Movie::query()
            ->where('list_id', 3)
            ->latest('id')
            ->take(12)
            ->get();
        $dataPhimSapChieu = Movie::query()
            ->where('list_id', 6)
            ->latest('id')
            ->take(12)
            ->get();
        $banner = Setting::query()->select(['banner_video','tieu_de','noi_dung','id'])->get();
        return view('page', compact('dataPhimMoiThem', 'dataPhimLe', 'dataPhimBo', 'dataTvShows','dataPhimSapChieu','banner'));
    }

    public function detail(string $slug)
    {

        $model = Movie::query()
            ->with(['catelogue', 'episode','comment'])
            ->where('slug', $slug)
            ->firstOrFail()
            ->toArray();
        $mangSao = [];
        if(count($model['comment']) > 0){
            foreach ($model['comment'] as $item){
                $mangSao[] = $item['sao'];
            }
            $avgSao = array_sum($mangSao) / count($mangSao);
        }else{
            $avgSao = 0;
        }
        $soBinhLuan = count($model['comment']);
        $is_vip = 0;
        if (Auth::check()) {
            $is_vip = Auth::user()->is_vip;
        }

        $mangIdTheLoai = [];
        foreach ($model['catelogue'] as $theLoai){
            $mangIdTheLoai[] = $theLoai['id'];
        }
        $danhSachIdPhimLienQuan = DB::table('movie_catelogue')->whereIn('catelogue_id',$mangIdTheLoai)->get();
        $phimIds = $danhSachIdPhimLienQuan->pluck('movie_id')->toArray();
        $phimLienQuan = Movie::query()->with('lists')
            ->whereIn('id', $phimIds)
            ->where('slug','!=',$slug)
            ->orderByDesc('id')
            ->get();
        $dataUser = [];
        if (Auth::check()) {
            $dataUser = User::query()->with(['movies', 'coin'])->find(Auth::user()->id)->toArray();
        }
        $dataLuotXem = [];

        foreach ($model['episode'] as $item){
            $dataLuotXem[] = $item['luot_xem'];
        }
        $tongLuotXem = array_sum($dataLuotXem);
        return view('detail', compact('model', 'phimLienQuan', 'is_vip','dataUser','avgSao','soBinhLuan','tongLuotXem'));
    }


    public function apiListFavourite(string $slug)
    {
        $dataFavourite = session('favourite');
        $movie = collect($dataFavourite)->firstWhere('slug', $slug);

        if ($movie) {
            $json = [
                'status' => true,
                'msg' => 'thanh cong',
                'data' => $movie
            ];
        } else {
            $json = [
                'status' => false,
                'msg' => 'Phim không tìm thấy',
                'data' => null
            ];
        }

        return response()->json($json, 200);
    }

    public function apiTrangThaiMuaPhim(string $slug)
    {
        $model = Movie::query()
            ->with(['catelogue', 'episode'])
            ->where('slug', $slug)
            ->firstOrFail()
            ->toArray();
        $trangThaiMuaPhim = false;
        $dataUser = [];
        if (Auth::check()) {
            $dataUser = User::query()->with(['movies', 'coin'])->find(Auth::user()->id)->toArray();
            foreach ($dataUser['movies'] as $item) {
                if ($item['id'] == $model['id']) {
                    $trangThaiMuaPhim = true;
                }
            }
        }
        if($trangThaiMuaPhim){
            $json = [
                'status'=>true
            ];
        }else{
            $json = [
                'status'=>false
            ];
        }
        return response()->json($json,200);
    }


    public function watch(string $slug, int $tap, Request $request)
    {
        $model = Movie::query()->with(['catelogue', 'episode'])
            ->where('slug', $slug)
            ->firstOrFail();

        $episode = $model->episode()->where('tap', $tap)->firstOrFail()->toArray();

        return view('watch', compact('model', 'episode'));
    }

    public function favourite()
    {
        return view('favourite');
    }

    public function addFavourite(Request $request)
    {
        if (!session()->has('favourite')) {
            session(['favourite' => []]);
        }

        $favourites = session('favourite');

        $movie = Movie::find($request->movie_id);

        if ($movie && !in_array($movie->id, array_column($favourites, 'id'))) {
            $favourites[] = $movie;
            session(['favourite' => $favourites]);
        }

        return back();
    }

    public function removeFavourite(Request $request)
    {
        $id = $request->id;

        $favourites = session('favourite', []);

        $updatedFavourites = array_filter($favourites, function ($movie) use ($id) {
            return $movie['id'] != $id;
        });

        session(['favourite' => $updatedFavourites]);

        return back();
    }

    public function danhSachPhim(string $id)
    {
        $data = Movie::query()->where('list_id', $id)->paginate(18);

        $list = Lists::find($id);
        return view('lists', compact('data', 'list'));
    }

    public function search()
    {
        return view('search');
    }

    public function likeMovie(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        UserMovieLike::create($data);
    }

    public function unLikeMovie(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        UserMovieLike::query()->where($data)->delete();
    }

    public function apiUserLike(int $movie_id)
    {
        $data = UserMovieLike::where('user_id', Auth::user()->id)->where('movie_id', $movie_id)->first();
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

    public function apiCounLikeMovie(int $movie_id)
    {
        $data = UserMovieLike::query()->where('movie_id', $movie_id)->count();
        if ($data) {
            $json = [
                'status' => true,
                'data' => $data
            ];
        }elseif($data == null){
            $json = [
                'status' => true,
                'data' => 0
            ];
        }
        else {
            $json = [
                'status' => false,
            ];
        }
        return response()->json($json, 200);
    }


}
