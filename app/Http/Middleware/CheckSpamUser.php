<?php

namespace App\Http\Middleware;

use App\Models\AdminNotification;
use App\Models\Fund;
use App\Models\FundTransaction;
use App\Models\Notification;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckSpamUser
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
            $user = Auth::user();
            $tongQuy = Fund::select('tong_tien')->first();
            $tongTienTrongQuy = $tongQuy ? $tongQuy->tong_tien : 0;

            $userSpamCount = Notification::where('user_id', $user->id)->where('trang_thai', 'Spam')->count();

            if ($userSpamCount == 3) {
                $adminNotificationCheck = AdminNotification::where('user_id', $user->id)
                    ->where('noi_dung', 'Tài khoản của bạn đã thực hiện 3 lần spam nếu thực hiện hơn sẽ bị khóa tài khoản hoặc bị trừ 5000 xu')
                    ->count();

                if ($adminNotificationCheck == 0) {
                    AdminNotification::create([
                        'user_id' => $user->id,
                        'noi_dung' => 'Tài khoản của bạn đã thực hiện 3 lần spam nếu thực hiện hơn sẽ bị khóa tài khoản hoặc bị trừ 5000 xu',
                    ]);
                }

                return $next($request);
            } elseif ($userSpamCount > 3) {
                $user = User::with('coin')->where('id', $user->id)->first();
                $userCoin = $user->coin[0]->coin;

                if ($userCoin >= 5000 && $userSpamCount > 3) {
                    try {
                        DB::beginTransaction();

                        AdminNotification::create([
                            'user_id' => $user->id,
                            'noi_dung' => 'Tài khoản của bạn đã bị trừ 5000 xu phí phạt spam',
                        ]);

                        DB::table('user_coins')->where('user_id', $user->id)->decrement('coin', 5000);
                        Fund::increment('tong_tien', 5000);

                        FundTransaction::create([
                            'user_id' => $user->id,
                            'bien_dong_so_du' => '+5000',
                            'mo_ta' => "Tiền phạt người dùng spam quá 3 lần",
                            'truoc_giao_dich' => $tongTienTrongQuy,
                            'sau_giao_dich' => $tongTienTrongQuy + 5000,
                        ]);

                        DB::table('transaction_histories')->insert([
                            "user_id" => $user->id,
                            "truoc_giao_dich" => $userCoin,
                            "sau_giao_dich" => $userCoin - 5000,
                            "bien_dong_so_du" => '-5000',
                            "mo_ta" => "Tiền phạt người dùng spam quá 3 lần",
                            "ngay_tao" => now()
                        ]);

                        Notification::where('user_id', $user->id)->where('trang_thai', 'Spam')->delete();
                        DB::commit();

                        return $next($request);
                    } catch (\Exception $e) {
                        DB::rollBack();
                        return $next($request);
                    }
                } elseif ($userCoin < 5000 && $userSpamCount > 3) {
                    User::where('id', $user->id)->update(['is_spam' => 1]);
                    Auth::logout();
                    return redirect()->route('login')->with('message', 'Bạn đã spam quá nhiều chúng tôi sẽ khóa tài khoản của bạn trong 6h');
                }
            }
            return $next($request);
        }

        return $next($request);
    }
}
