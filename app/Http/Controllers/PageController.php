<?php

namespace App\Http\Controllers;

use App\Models\Catelogue;
use App\Models\Fund;
use App\Models\fundTransaction;
use App\Models\Lists;
use App\Models\Movie;
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
        $dataPhimMoiThem = Movie::query()->with('lists')
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

        return view('page', compact('dataPhimMoiThem', 'dataPhimLe', 'dataPhimBo', 'dataTvShows'));
    }

    public function detail(string $slug)
    {

        $model = Movie::query()
            ->with(['catelogue', 'episode'])
            ->where('slug', $slug)
            ->firstOrFail()
            ->toArray();
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
        return view('detail', compact('model', 'phimLienQuan', 'is_vip','dataUser'));
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
        // Tìm phim theo slug
        $model = Movie::query()->with(['catelogue', 'episode'])
            ->where('slug', $slug)
            ->firstOrFail();

        // Tìm tập phim theo tap
        $episode = $model->episode()->where('tap', $tap)->firstOrFail()->toArray();

        // Chuyển dữ liệu phim và tập phim sang view
        return view('watch', compact('model', 'episode'));
    }

    public function favourite()
    {
        return view('favourite');
    }

    public function addFavourite(Request $request)
    {
        // Kiểm tra xem session 'favourite' đã tồn tại chưa, nếu chưa thì khởi tạo nó với một mảng rỗng
        if (!session()->has('favourite')) {
            session(['favourite' => []]);
        }

        // Lấy giá trị của session 'favourite'
        $favourites = session('favourite');

        // Tìm bộ phim theo ID
        $movie = Movie::find($request->movie_id);

        // Kiểm tra nếu bộ phim tồn tại và không có trong danh sách yêu thích
        if ($movie && !in_array($movie->id, array_column($favourites, 'id'))) {
            // Thêm bộ phim vào danh sách yêu thích
            $favourites[] = $movie;
            session(['favourite' => $favourites]);
        }

        // C// Quay lại trang trước
        return back();
    }

    public function removeFavourite(Request $request)
    {
        // Lấy ID của bộ phim cần xóa
        $id = $request->id;

        // Lấy danh sách yêu thích từ session
        $favourites = session('favourite', []);

        // Tìm và loại bỏ bộ phim có ID tương ứng khỏi danh sách yêu thích
        $updatedFavourites = array_filter($favourites, function ($movie) use ($id) {
            return $movie['id'] != $id;
        });

        // Cập nhật lại session với danh sách yêu thích đã được loại bỏ bộ phim
        session(['favourite' => $updatedFavourites]);

        // Quay lại trang trước
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

    public function fund()
    {
        $tongQuy = Fund::query()->select('tong_tien')->get();
        $lichSuGiaoDich = fundTransaction::query()->orderByDesc('id')->get();
        return view('fund',compact('tongQuy','lichSuGiaoDich'));
    }

}
