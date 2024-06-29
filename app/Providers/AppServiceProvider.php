<?php

namespace App\Providers;

use App\Models\CateloguePost;
use App\Models\Lists;
use App\Models\Post;
use App\Models\TagPost;
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

        $postHot = Post::query()->orderByDesc('luot_xem')->limit(4)->get();
        $danhMuc = CateloguePost::query()->pluck('ten','id')->all();
        $tags = TagPost::query()->pluck('ten','id')->all();
        $lists = Lists::query()->pluck('ten','id')->all();
        View::share([
            'postHot' => $postHot,
            'danhMuc' => $danhMuc,
            'tags' => $tags,
            'lists' => $lists,
        ]);

    }
}
