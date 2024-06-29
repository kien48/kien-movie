<?php

use App\Http\Controllers\Admin\Auth\AdminUserController;
use App\Http\Controllers\Admin\Auth\MemberUserController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\CatelogueController;
use App\Http\Controllers\Admin\CateloguePostController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('home');
Route::get('/detail/{slug}', [App\Http\Controllers\PageController::class, 'detail'])->name('detail');
Route::get('/watch/{slug}/{tap}', [App\Http\Controllers\PageController::class, 'watch'])->name('watch');
Route::get('/favourite', [App\Http\Controllers\PageController::class, 'favourite'])->name('favourite');
Route::post('/add-favourite', [App\Http\Controllers\PageController::class, 'addFavourite'])->name('add');
Route::post('/remove-favourite', [App\Http\Controllers\PageController::class, 'removeFavourite'])->name('remove');
Route::get('/danh-sach-phim/{id}', [App\Http\Controllers\PageController::class, 'danhSachPhim'])->name('lists');
Route::get('/tim-kiem', [App\Http\Controllers\PageController::class, 'search'])->name('search');
Route::post('/mua-phim', [App\Http\Controllers\UserCoinController::class, 'muaPhim'])->name('muaPhim');
Route::get('/nap-xu', [App\Http\Controllers\UserCoinController::class, 'napXu'])->name('napXu');
Route::get('/lich-su-giao-dich', [App\Http\Controllers\Auth\HomeController::class, 'transactions'])->name('transactions');

//VNpay
Route::post('/vnpay', [App\Http\Controllers\Auth\HomeController::class, 'vnPay'])->name('vnPay');
Route::get('/return-vnpay', [App\Http\Controllers\Auth\HomeController::class, 'return'])->name('return');
Route::get('/success', [App\Http\Controllers\Auth\HomeController::class, 'success'])->name('success');
Route::get('/error', [App\Http\Controllers\Auth\HomeController::class, 'error'])->name('error');


Route::get('/blogs', [App\Http\Controllers\PostController::class, 'index'])->name('blogs');
Route::get('/chi-tiet/{slug}', [App\Http\Controllers\PostController::class, 'detail'])->name('chitiet');

Route::prefix('api')->group(function (){

    Route::resource('/movie', MovieController::class);
    Route::get('/comment/movie/{id}', [CommentController::class, 'index']);
    Route::resource('/comment', CommentController::class);
    Route::get('/favourite/{slug}', [PageController::class, 'apiListFavourite']);
    Route::get('/episode/{slug}', [\App\Http\Controllers\Admin\MovieController::class, 'apiEpisode']);


});
Auth::routes();
Route::get('/tai-khoan', [App\Http\Controllers\Auth\HomeController::class, 'index'])->name('index');
Route::get('/phim-da-mua', [App\Http\Controllers\Auth\HomeController::class, 'purchasedMovies'])->name('purchasedMovies');


Route::prefix('admin')
    ->as('admin.')
    ->group(function (){
        Route::prefix('movies')
            ->as('movies.')
            ->group(function (){
                Route::get('/',[\App\Http\Controllers\Admin\MovieController::class,'index'])->name('index');
                Route::get('create',[\App\Http\Controllers\Admin\MovieController::class,'create'])->name('create');
                Route::post('store',[\App\Http\Controllers\Admin\MovieController::class,'store'])->name('store');
                Route::get('{slug}/show',[\App\Http\Controllers\Admin\MovieController::class,'show'])->name('show');
                Route::get('{slug}/edit',[\App\Http\Controllers\Admin\MovieController::class,'edit'])->name('edit');
                Route::put('{slug}/update',[\App\Http\Controllers\Admin\MovieController::class,'update'])->name('update');

            });

        Route::resource('catelogues', CatelogueController::class);
        Route::resource('members', MemberUserController::class);
        Route::resource('admins', AdminUserController::class);
        Route::resource('payments', PaymentController::class);
        Route::resource('bills', BillController::class);
        Route::resource('catelogue-posts', CateloguePostController::class);
        Route::resource('posts', PostController ::class);


    });


