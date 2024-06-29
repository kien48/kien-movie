<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserCoinController extends Controller
{
    //
    public function muaPhim(Request $request)
    {
        $movie_id = $request->movie_id;
        $movie = Movie::query()->find($movie_id);
        $ten_movie = $movie->ten;
        $coin = (int) $request->coin; // Đảm bảo rằng $coin là số nguyên
        $user = Auth::user();
        $user_coin = DB::table('user_coins')->where('user_id', $user->id)->value('coin');

        try {
            DB::beginTransaction();
            // Kiểm tra số dư coin của người dùng
            if ($user->coin[0]['coin'] >= $coin) {
                // Trừ số coin từ số dư của người dùng
                $newCoin  = $user->coin[0]['coin'] - $coin;
                DB::table('user_coins')->where('user_id', $user->id)->update(['coin' => $newCoin]);

                // Thêm phim vào danh sách phim của người dùng mà không xoá các phim đã có
                $user->movies()->syncWithoutDetaching([$movie_id]);
                Bill::query()->create([
                    'user_id' => $user->id,
                    'movie_id' => $movie_id,
                    'xu'=>$coin
                ]);
                DB::table('transaction_histories')->insert([
                    'user_id' => $user->id,
                    'truoc_giao_dich' => $user_coin,
                    'sau_giao_dich' => $user_coin - $coin,
                    'bien_dong_so_du' => '-'.$coin,
                    'mo_ta'=>'Mua phim: '.$ten_movie,
                    'ngay_tao'=>now()
                ]);
                DB::commit();
                return redirect()->back()->with('success', 'Đã mua phim thành công');
            } else {
                // Nếu số dư coin không đủ, rollback giao dịch
                DB::rollBack();
                return redirect()->back()->withErrors(['error' => 'Số dư coin không đủ']);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('home');
        }
    }

    public function napXu()
    {
        return view('auth.coins');
    }


}
