<?php

namespace App\Http\Middleware;

use App\Models\Fund;
use App\Models\FundTransaction; // Updated model name
use App\Models\Notification;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CongTienBaoLoi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $tongQuy = Fund::query()->select('tong_tien')->first();
            $tongTienTrongQuy = $tongQuy->tong_tien ?? 0;

            $user = User::query()->with('coin')->find(Auth::id()); // Simplified to use find method
            $userCoin = $user->coin[0]->coin ;

            $dem = Notification::query()
                ->where('user_id', Auth::id())
                ->where('trang_thai', 'Đã fix')
                ->count();

            if ($tongTienTrongQuy > 20000) {
                if ($dem == 20) {
                    $this->congTienThuong(Auth::id(), $userCoin, 10000, "+10000", "Tiền thưởng báo lỗi phim trên 20 lần đã giúp admin fix thành công");
                    FundTransaction::query()->create([
                        'user_id' => Auth::id(), // Use Auth::id() directly
                        'bien_dong_so_du' => '-10000', // Use negative value for decrement
                        'mo_ta' => "Tiền thưởng báo lỗi phim trên 20 lần đã giúp admin fix thành công", // Corrected quotation
                        'truoc_giao_dich' => $tongTienTrongQuy,
                        'sau_giao_dich' => $tongTienTrongQuy - 10000,
                    ]);
                    Fund::query()->decrement('tong_tien', 10000);
                } elseif ($dem == 10) {
                    $this->congTienThuong(Auth::id(), $userCoin, 5000, "+5000", "Tiền thưởng báo lỗi phim trên 10 lần đã giúp admin fix thành công");
                    FundTransaction::query()->create([
                        'user_id' => Auth::id(),
                        'bien_dong_so_du' => '-5000',
                        'mo_ta' => "Tiền thưởng báo lỗi phim trên 10 lần đã giúp admin fix thành công",
                        'truoc_giao_dich' => $tongTienTrongQuy,
                        'sau_giao_dich' => $tongTienTrongQuy - 5000,
                    ]);
                    Fund::query()->decrement('tong_tien', 5000);
                } elseif ($dem == 5) {
                    $this->congTienThuong(Auth::id(), $userCoin, 2000, "+2000", "Tiền thưởng báo lỗi phim trên 5 lần đã giúp admin fix thành công");
                    FundTransaction::query()->create([
                        'user_id' => Auth::id(),
                        'bien_dong_so_du' => '-2000',
                        'mo_ta' => "Tiền thưởng báo lỗi phim trên 5 lần đã giúp admin fix thành công",
                        'truoc_giao_dich' => $tongTienTrongQuy,
                        'sau_giao_dich' => $tongTienTrongQuy - 2000,
                    ]);
                    Fund::query()->decrement('tong_tien', 2000);
                }
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
            DB::table('user_coins')
                ->where('user_id', $userId)
                ->increment('coin', $amount);

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
