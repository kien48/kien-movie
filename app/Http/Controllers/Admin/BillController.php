<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = "admin.bills.";
    public function index()
    {
        //
        $data = Bill::query()->with(['user','movie'])->latest('id')->get();
        return view(self::PATH_VIEW.__FUNCTION__,compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function thongKe()
    {
        $data = Bill::query()
            ->join('users', 'bills.user_id', '=', 'users.id')
            ->join('movies', 'bills.movie_id', '=', 'movies.id')
            ->select('users.id as user_id','users.name as user_name', DB::raw('SUM(bills.xu) as total_xu'))
            ->groupBy('users.id')->orderByDesc('total_xu')
            ->get();
        return view(self::PATH_VIEW.__FUNCTION__,compact('data'));
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
