<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Comment;
use App\Models\Payment_recharge;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserCoin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        //

        $data =  User::query()->with(['movies','coin'])->find(Auth::user()->id)->toArray();
        return view('auth.home',compact('data'));
    }

    public function purchasedMovies()
    {
        $data = Bill::query()
            ->where('bills.user_id', Auth::user()->id)
            ->leftJoin('movies', 'movies.id', '=', 'bills.movie_id')
            ->select('bills.*', 'movies.ten','movies.anh','movies.slug')
            ->latest()
            ->get()
            ->toArray();
        return view('auth.movies',compact('data',));
    }

    public function vnPay()
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = 'http://movie.test/return-vnpay';
        $vnp_TmnCode = "7MQ7T61V";//Mã website tại VNPAY
        $vnp_HashSecret = "P0EV4F807TEM4MFP4SWW9WMQB55DQB8A"; //Chuỗi bí mật

        $vnp_TxnRef = time().""; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    $vnp_OrderInfo = 'Thanh toán đơn hàng';
    $vnp_OrderType = 'bill';
    $vnp_Amount = $_POST['coin'] *100;
    $vnp_Locale = 'vn';
    $vnp_BankCode = 'NCB';
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    //Add Params of 2.0.1 Version
//    $vnp_ExpireDate = $_POST['txtexpire'];

    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
//        "vnp_ExpireDate"=>$vnp_ExpireDate
    );

    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    }

    //var_dump($inputData);
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array('code' => '00'
    , 'message' => 'success'
    , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        // vui lòng tham khảo thêm tại code demo
    }

    public function return()
    {
        $ma_giao_dich = $_GET['vnp_TxnRef'];
        $tien = $_GET['vnp_Amount'] / 100;
        $phuong_thuc = $_GET['vnp_CardType'];
        $so_giao_dich = $_GET['vnp_TransactionNo'];
        $user_id = Auth::user()->id;
        $tinh_trang_thanh_toan = ($_GET['vnp_ResponseCode'] == '00') ? 'Thành công' : 'Thất bại';
        $coin = DB::table('user_coins')->where('user_id', $user_id)->value('coin');

        try {
            DB::beginTransaction();

            // Lưu thông tin giao dịch vào bảng payment_recharges
            Payment_recharge::query()->create([
                "user_id" => $user_id,
                "so_giao_dich" => $so_giao_dich,
                "xu" => $tien,
                "phuong_thuc_thanh_toan" => $phuong_thuc,
                "tinh_trang_thanh_toan" => $tinh_trang_thanh_toan,
            ]);

            // Nếu thanh toán thành công, cập nhật số xu cho người dùng
            if ($tinh_trang_thanh_toan == 'Thành công') {
                DB::table('user_coins')->where('user_id', $user_id)->increment('coin', $tien);
                DB::table('transaction_histories')->insert([
                    'user_id' => $user_id,
                    'truoc_giao_dich' => $coin,
                    'sau_giao_dich' => $coin+ $tien,
                    'bien_dong_so_du' => "+".$tien,
                    'mo_ta'=>'Nạp tiền mã giao dịch: '.$ma_giao_dich,
                    'ngay_tao'=>now()
                ]);

            }


            DB::commit();

            if ($tinh_trang_thanh_toan == 'Thành công') {
                return redirect()->route('success');
            } else {
                return redirect()->route('error');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error');
        }
    }


    public function success()
    {
        $tongXuUser = DB::table('payment_recharges')->where('user_id',Auth::user()->id)->sum('xu');
        if($tongXuUser >= 1000000){
            User::query()->where('id',Auth::user()->id)->update(['is_vip'=>1]);
        }
        return view('auth.success');
    }

    public function error()
    {
        return view('auth.error');
    }

    public function transactions()
    {
        $data = DB::table('transaction_histories')->where('user_id',Auth::user()->id)->latest('id')->paginate(7);
        return view('auth.transaction',compact('data'));
    }



}
