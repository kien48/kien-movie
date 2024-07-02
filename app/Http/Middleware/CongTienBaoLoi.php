<?php

namespace App\Http\Middleware;

use App\Models\Notification;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CongTienBaoLoi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            $user = User::query()->with('coin')->where('id',Auth::user()->id)->get();
            $userCoin = $user[0]->coin[0]->coin;
            $dem = Notification::query()->where('user_id',Auth::user()->id)->where('trang_thai','Đã fix')->count();

            if ($dem == 10) {
                $this->congTienThuong(Auth::user()->id, $userCoin, 10000, "+10000", "Tiền thưởng báo lỗi phim trên 10 lần đã giúp admin fix thành công");
            } elseif ($dem == 5) {
                $this->congTienThuong(Auth::user()->id, $userCoin, 5000, "+5000", "Tiền thưởng báo lỗi phim trên 5 lần đã giúp admin fix thành công");
            } elseif ($dem == 2) {
                $this->congTienThuong(Auth::user()->id, $userCoin, 2000, "+2000", "Tiền thưởng báo lỗi phim trên 2 lần đã giúp admin fix thành công");
            }
        }

        return $next($request);
    }

    private function congTienThuong($userId, $userCoin, $amount, $description, $note)
    {
        $received = DB::table('transaction_histories')
            ->where('user_id', $userId)
            ->where('mo_ta', $note)
            ->exists();

        if (!$received) {
            DB::table('user_coins')->where('user_id', $userId)->increment('coin', $amount);
            DB::table('transaction_histories')->insert([
                "user_id" => $userId,
                "truoc_giao_dich" => $userCoin,
                "sau_giao_dich" => $userCoin + $amount,
                "bien_dong_so_du" => $description,
                "mo_ta" => $note,
                "ngay_tao" => now()
            ]);
        }
    }
}
