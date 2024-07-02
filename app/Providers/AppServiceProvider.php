<?php

namespace App\Providers;

use App\Models\CateloguePost;
use App\Models\Lists;
use App\Models\Post;
use App\Models\TagPost;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

        $postHot = Post::query()->where('catelogue_post_id','!=',3)
            ->orderByDesc('luot_xem')
            ->limit(4)->get();

        $danhMuc = CateloguePost::query()->where('id','!=',3)->get();

        $tags = TagPost::query()->get();

        $lists = Lists::query()->pluck('ten','id')->all();

        $postFooter = Post::query()->where('catelogue_post_id',3)->get();

        View::share([
            'postFooter'=>$postFooter,
            'postHot' => $postHot,
            'danhMuc' => $danhMuc,
            'tags' => $tags,
            'lists' => $lists,
        ]);

        if (Auth::check()) {
            $user = Auth::user();
            $activeUser = User::where('id', $user->id)
                ->where('is_active', 1)
                ->first();
            if ($activeUser) {
                Auth::logout();
            }
        }


    }
}
