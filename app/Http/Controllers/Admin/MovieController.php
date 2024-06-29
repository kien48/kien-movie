<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $data = Movie::query()->latest('id')->get();
        return view(self::PATH_VIEW.__FUNCTION__,compact('data'));
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


        // Lấy dữ liệu phim, ngoại trừ các trường 'catelogue_id' và 'tap_phim'
        $dataMovie = $request->except('catelogue_id', 'tap_phim');
        $dataMovie['slug'] = Str::slug($dataMovie['ten']); // Thêm \Illuminate\Support\ để sử dụng Str
        $dataMovie['is_vip'] = isset($request->is_vip) ? 1 : 0;
        // Lấy dữ liệu tập phim
        $dataTapPhimTmp = $request->tap_phim;
        $dataTapPhim = [];
        foreach ($dataTapPhimTmp as $key => $value) {
            $dataTapPhim[] = [
                'so' => $value['so'], // Chuyển đổi 'tap' thành 'so' để khớp với các trường trong yêu cầu
                'link' => $value['link']
            ];
        }
        if(count($dataTapPhim) == $dataMovie['so_tap']){
            $dataMovie['trang_thai'] = "Full";
        }else{
            $dataMovie['trang_thai'] = "Đang cập nhật";
        }
        try {
            // Bắt đầu transaction
            DB::beginTransaction();

            // Tạo phim mới
            $movie = Movie::query()->create($dataMovie);

            // Tạo các tập phim mới liên kết với phim vừa tạo
            foreach ($dataTapPhim as $tap) {
                Episode::query()->create([
                    'tap' => $tap['so'],
                    'link' => $tap['link'],
                    'movie_id' => $movie->id // Đảm bảo trường khóa ngoại đúng (movie_id)
                ]);
            }

            // Đồng bộ hóa danh mục phim
            $movie->catelogue()->sync($request->catelogue_id);

            // Commit transaction
            DB::commit();
            return redirect()->route('admin.movies.index');

        } catch (\Exception $exception) {
            // Rollback transaction nếu có lỗi
            DB::rollBack();
            return back();
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

            // Cập nhật hoặc tạo mới các tập phim
            $tapPhimData = [];
            foreach ($request->input('tap_phim') as $tap) {
                // Đảm bảo link không null trước khi thêm vào tapPhimData
                if (!empty($tap['link'])) {
                    $tapPhimData[] = [
                        'tap' => $tap['so'],
                        'link' => $tap['link'],
                        'movie_id' => $movie->id,
                    ];
                }
            }
            // Xóa các tập phim hiện có liên quan đến phim này
            Episode::where('movie_id', $movie->id)->delete();
            // Thêm các tập phim mới vào
            Episode::insert($tapPhimData);

            // Đồng bộ hóa danh mục phim
            $movie->catelogue()->sync($request->input('catelogue_id'));

            // Xác nhận giao dịch thành công
            DB::commit();

            // Chuyển hướng đến route admin.movies.index
            return redirect()->route('admin.movies.index');
        } catch (\Exception $exception) {
            // Quay lại trang trước đó nếu có lỗi xảy ra và thông báo lỗi
            DB::rollBack();
            return back()->withErrors(['error' => $exception->getMessage()]);
        }
    }




}
