<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Catelogue;
use App\Models\Episode;
use App\Models\Lists;
use App\Models\Movie;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MovieController extends Controller
{
    //

    const PATH_VIEW = "admin.movies.";
    public function index()
    {
        $countPhimDangCapNhat = Movie::query()->where('trang_thai','Đang cập nhật')->count();
        $countPhimFull = Movie::query()->where('trang_thai','Full')->count();
        $countPhimSapChieu = Movie::query()
            ->where('list_id', '6')
            ->count();

        $data = Movie::query()->with('lists')->orderByDesc('id')->get();
        return view(self::PATH_VIEW.__FUNCTION__,compact('data','countPhimDangCapNhat','countPhimFull','countPhimSapChieu'));
    }

    public function create()
    {
        $dataCatelogues = Catelogue::query()->get();
        $dataLists = Lists::query()->get();
        return view(self::PATH_VIEW.__FUNCTION__,compact('dataCatelogues','dataLists'));
    }
    public function store(Request $request)
    {
        // Định nghĩa các rules cho validation
        $validator = Validator::make($request->all(), [
            'ten' => 'required|string|max:255',
            'list_id' => 'required|exists:lists,id',
            'anh' => 'required|url|nullable',
            'ngon_ngu' => 'required|string|nullable',
            'so_tap' => 'required|integer|nullable',
            'gia' => 'required|integer|nullable',
            'chat_luong' => 'required|string|nullable',
            'dao_dien' => 'required|string|nullable',
            'dien_vien' => 'required|string|nullable',
            'nam_phat_hanh' => 'required|string|nullable',
            'quoc_gia' => 'required|string|nullable',
            'mo_ta' => 'required|string|nullable',
            'catelogue_id' => 'required|array'
        ]);

        // Nếu validation không thành công, quay lại form và hiển thị lỗi
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $dataMovie = $request->except('catelogue_id', 'tap_phim');
        $dataMovie['slug'] = Str::slug($dataMovie['ten']);
        $dataMovie['is_vip'] = isset($request->is_vip) ? 1 : 0;
        $dataTapPhimTmp = [];
        if($request->tap_phim != null){
            $dataTapPhimTmp = $request->tap_phim;
        }
        $dataTapPhim = [];
        foreach ($dataTapPhimTmp as $key => $value) {
            $dataTapPhim[] = [
                'so' => $value['so'],
                'link' => $value['link']
            ];
        }
        if(count($dataTapPhim) == $dataMovie['so_tap']){
            $dataMovie['trang_thai'] = "Full";
        }else{
            $dataMovie['trang_thai'] = "Đang cập nhật";
        }
        try {
            DB::beginTransaction();

            $movie = Movie::query()->create($dataMovie);

            // Tạo các tập phim mới liên kết với phim vừa tạo
            foreach ($dataTapPhim as $tap) {
                Episode::query()->create([
                    'tap' => $tap['so'],
                    'link' => $tap['link'],
                    'movie_id' => $movie->id // Đảm bảo trường khóa ngoại đúng (movie_id)
                ]);
            }

            $movie->catelogue()->sync($request->catelogue_id);

            DB::commit();
            return back()->with('success','Thêm phim thành công');

        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->with('error','Thêm lỗi');
        }
    }

    public function show(string $slug)
    {
        $modelMovie = Movie::query()->with(['catelogue', 'episode', 'lists'])->where('slug', $slug)->firstOrFail()->toArray();
        $modelCatelogue = $modelMovie['catelogue'];
        $modelEpisode = $modelMovie['episode'];

       return view(self::PATH_VIEW.__FUNCTION__,compact('modelMovie','modelCatelogue','modelEpisode'));
    }
    public function edit(string $slug)
    {
        $modelMovie = Movie::query()->with(['catelogue', 'episode', 'lists'])->where('slug', $slug)->firstOrFail()->toArray();
        $modelCatelogue = $modelMovie['catelogue'];
        $modelEpisode = $modelMovie['episode'];
        $dataCatelogues = Catelogue::query()->get();
        $dataLists = Lists::query()->get();
        return view(self::PATH_VIEW.__FUNCTION__,compact('dataCatelogues','dataLists','modelMovie','modelCatelogue','modelEpisode'));
    }

    public function apiEpisode(string $slug)
    {
        $modelMovie = Movie::query()->with(['catelogue', 'episode', 'lists'])->where('slug', $slug)->firstOrFail()->toArray();
        $modelEpisode = $modelMovie['episode'];
        $json = [
            'data' => $modelEpisode
        ];
        return response()->json($json,200);
    }
    public function update(string $slug, Request $request)
    {
        // Định nghĩa các luật kiểm tra
        $validator = Validator::make($request->all(), [
            'ten' => 'required|string|max:255',
            'list_id' => 'required|exists:lists,id',
            'anh' => 'nullable|url',
            'ngon_ngu' => 'nullable|string',
            'so_tap' => 'nullable|integer',
            'gia' => 'nullable|integer',
            'chat_luong' => 'nullable|string',
            'dao_dien' => 'nullable|string',
            'dien_vien' => 'nullable|string',
            'nam_phat_hanh' => 'nullable|string',
            'quoc_gia' => 'nullable|string',
            'mo_ta' => 'nullable|string',
            'tap_phim.*.so' => 'required|integer',
            'catelogue_id' => 'required|array',
        ]);

        // Nếu validation không thành công, quay lại với thông báo lỗi và dữ liệu đã nhập
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Bắt đầu giao dịch
            DB::beginTransaction();

            // Tìm phim dựa vào slug
            $movie = Movie::where('slug', $slug)->firstOrFail();

            // Cập nhật thông tin phim
            $movie->update([
                'ten' => $request->input('ten'),
                'list_id' => $request->input('list_id'),
                'anh' => $request->input('anh'),
                'ngon_ngu' => $request->input('ngon_ngu'),
                'so_tap' => $request->input('so_tap'),
                'gia' => $request->input('gia'),
                'chat_luong' => $request->input('chat_luong'),
                'dao_dien' => $request->input('dao_dien'),
                'dien_vien' => $request->input('dien_vien'),
                'nam_phat_hanh' => $request->input('nam_phat_hanh'),
                'quoc_gia' => $request->input('quoc_gia'),
                'mo_ta' => $request->input('mo_ta'),
                'is_vip' => $request->has('is_vip') ? 1 : 0,
                'trang_thai' => (count($request->input('tap_phim')) -1) == $request->input('so_tap') ? 'Full' : 'Đang cập nhật',
            ]);

            $tapPhimData = [];
            foreach ($request->input('tap_phim') as $tap) {
                if (!empty($tap['link'])) {
                    $tapPhimData[] = [
                        'tap' => $tap['so'],
                        'link' => $tap['link'],
                        'movie_id' => $movie->id,
                    ];
                }
            }
            Episode::where('movie_id', $movie->id)->delete();
            Episode::insert($tapPhimData);

            $movie->catelogue()->sync($request->input('catelogue_id'));

            DB::commit();

            return back()->with('success','Cập nhật thành công');
        } catch (\Exception $exception) {
            // Quay lại trang trước đó nếu có lỗi xảy ra và thông báo lỗi
            DB::rollBack();
            return back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function thongKe()
    {
        $thongKe = Bill::query()->join('movies','bills.movie_id','movies.id')
            ->select('movies.ten',DB::raw('sum(xu) as total'))->groupBy('movies.ten')->get()->toArray();
//        dd($thongKe);
        return  view(self::PATH_VIEW."thongke",compact('thongKe') );
    }

}
