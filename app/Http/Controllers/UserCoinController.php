<?php

namespace App\Http\Controllers;

use App\Models\adminNotification;
use App\Models\Bill;
use App\Models\Fund;
use App\Models\fundTransaction;
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
        $coin = (int) $request->coin;
        $coinBill = ($coin * 80 ) / 100;
        $coinFund = $coin - $coinBill;
        $user = Auth::user();
        $user_coin = DB::table('user_coins')->where('user_id', $user->id)->value('coin');
        $tongQuy = Fund::query()->select('tong_tien')->first();

        try {
            DB::beginTransaction();
            if ($user->coin[0]['coin'] >= $coin) {
                $newCoin  = $user->coin[0]['coin'] - $coin;
                DB::table('user_coins')->where('user_id', $user->id)->update(['coin' => $newCoin]);

                $user->movies()->syncWithoutDetaching([$movie_id]);
                Bill::query()->create([
                    'user_id' => $user->id,
                    'movie_id' => $movie_id,
                    'xu'=>$coinBill
                ]);
                DB::table('transaction_histories')->insert([
                    'user_id' => $user->id,
                    'truoc_giao_dich' => $user_coin,
                    'sau_giao_dich' => $user_coin - $coin,
                    'bien_dong_so_du' => '-'.$coin,
                    'mo_ta'=>'Mua phim: '.$ten_movie,
                    'ngay_tao'=>now()
                ]);
                fundTransaction::query()->create([
                    'user_id' => $user->id,
                    'bien_dong_so_du' => "+".$coinFund,
                    'mo_ta'=>'Nạp quỹ khi mua phim '.$ten_movie,
                    'truoc_giao_dich'=>$tongQuy->tong_tien,
                    'sau_giao_dich'=>$tongQuy->tong_tien + $coinFund,
                ]);
                adminNotification::query()->create([
                    'user_id'=>$user->id,
                    'noi_dung'=>'Bạn đã mua phim: '.$ten_movie.' Thành công',
                ]);
                Fund::query()->increment('tong_tien', $coinFund);
                DB::commit();
                return redirect()->back()->with('success', 'Đã mua phim thành công');
            } else {
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
