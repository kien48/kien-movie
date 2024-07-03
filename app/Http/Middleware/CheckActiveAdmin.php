<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckActiveAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

                $user = User::query()->where('id',session('admin')->id)->get();
                if($user[0]->is_active == 1) {
                    session()->forget('admin');
                    return redirect('/admin/login')->with('errpr','Quyên truy cập admin của bạn đã bị khóa');
                }

        return $next($request);
    }
}
