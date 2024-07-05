<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Payment_recharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin.payments.';
    public function index()
    {
        //
        $data = Payment_recharge::query()->with('user')->latest('id')->get();
        return view(self::PATH_VIEW.__FUNCTION__,compact('data'));
    }
    public function thongKe()
    {
        $data = Payment_recharge::query()
            ->join('users', 'payment_recharges.user_id', '=', 'users.id')
            ->select('users.id as user_id','users.name as user_name',
                DB::raw('sum(payment_recharges.xu) as total_xu'))
            ->groupBy('users.id')->orderByDesc('total_xu')
            ->get();
        $dataThanhCong = Payment_recharge::query()->where('tinh_trang_thanh_toan','Thành công')->count();
        $dataHuy = Payment_recharge::query()->where('tinh_trang_thanh_toan','Thất bại')->count();

        return view(self::PATH_VIEW.__FUNCTION__,compact('data','dataThanhCong','dataHuy'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
