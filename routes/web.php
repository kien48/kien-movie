<?php

use App\Http\Controllers\Admin\Auth\AdminUserController;
use App\Http\Controllers\Admin\Auth\MemberUserController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\CatelogueController;
use App\Http\Controllers\Admin\CateloguePostController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagPostController;
use App\Http\Controllers\Auth\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PageController;
use App\Http\Middleware\CheckUserRole;
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
Route::middleware(['checkActiveMember','checkSpamMember','CongTienBaoLoi'])->group(function (){
    Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('home');
    Route::get('/detail/{slug}', [App\Http\Controllers\PageController::class, 'detail'])->name('detail');
    Route::get('/watch/{slug}/{tap}', [App\Http\Controllers\PageController::class, 'watch'])->name('watch');
    Route::get('/favourite', [App\Http\Controllers\PageController::class, 'favourite'])->name('favourite');
    Route::post('/add-favourite', [App\Http\Controllers\PageController::class, 'addFavourite'])->name('add');
    Route::post('/remove-favourite', [App\Http\Controllers\PageController::class, 'removeFavourite'])->name('remove');
    Route::get('/danh-sach-phim/{id}', [App\Http\Controllers\PageController::class, 'danhSachPhim'])->name('lists');
    Route::get('/tim-kiem', [App\Http\Controllers\PageController::class, 'search'])->name('search');

//like phim
    Route::post('/like', [App\Http\Controllers\PageController::class, 'likeMovie'])->name('likeMovie');
    Route::post('/unlike', [App\Http\Controllers\PageController::class, 'unLikeMovie'])->name('unLikeMovie');

//VNpay
    Route::post('/vnpay', [App\Http\Controllers\Auth\HomeController::class, 'vnPay'])->name('vnPay');
    Route::get('/return-vnpay', [App\Http\Controllers\Auth\HomeController::class, 'return'])->name('return');
    Route::get('/success', [App\Http\Controllers\Auth\HomeController::class, 'success'])->name('success');
    Route::get('/error', [App\Http\Controllers\Auth\HomeController::class, 'error'])->name('error');


    Route::get('/blogs', [App\Http\Controllers\PostController::class, 'index'])->name('blogs');
    Route::get('/chi-tiet/{slug}', [App\Http\Controllers\PostController::class, 'detail'])->name('chitiet');
    Route::get('/danh-muc-bai-viet/{id}/{slug}', [App\Http\Controllers\PostController::class, 'catelogue'])->name('danhMucBaiViet');
    Route::get('/tag-bai-viet/{id}/{slug}', [App\Http\Controllers\PostController::class, 'tag'])->name('tagBaiViet');
    Route::post('/them-luot-xem', [App\Http\Controllers\PostController::class, 'themLuotXem'])->name('themLuotXem');
    Route::get('/quy-phat-trien', [App\Http\Controllers\FundController::class, 'index'])->name('quy-phat-trien');

    Auth::routes();
    Route::post('/them-luot-xem-phim', [App\Http\Controllers\MovieController::class, 'store'])->name('themLuotXemPhim');

});

Route::middleware(['auth','checkActiveMember','checkSpamMember','CongTienBaoLoi'])->group(function () {
    Route::get('/nap-xu', [App\Http\Controllers\UserCoinController::class, 'napXu'])->name('napXu');
    Route::get('/lich-su-giao-dich', [App\Http\Controllers\Auth\HomeController::class, 'transactions'])->name('transactions');
    Route::post('/mua-phim', [App\Http\Controllers\UserCoinController::class, 'muaPhim'])->name('muaPhim');
    Route::get('/tai-khoan', [HomeController::class, 'index'])->name('index');
    Route::get('/phim-da-mua', [HomeController::class, 'purchasedMovies'])->name('purchasedMovies');
    Route::get('/cap-nhat-tai-khoan', [App\Http\Controllers\Auth\EditController::class, 'edit'])->name('capnhattk');
    Route::post('/cap-nhat-tai-khoan', [App\Http\Controllers\Auth\EditController::class, 'update'])->name('updatetk');
    Route::post('/bao-loi', [App\Http\Controllers\NotificationController::class, 'store'])->name('baoLoi');
    Route::post('/da-doc', [\App\Http\Controllers\AdminNotificationController::class, 'daDoc'])->name('daDoc');
    Route::post('like-comment/dislike', [App\Http\Controllers\CommentLikeController::class,'disLike'])->name('disLikeComment');
    Route::resource('like-comment', App\Http\Controllers\CommentLikeController::class);

});

Route::prefix('api')->group(function (){

    Route::resource('/movie', MovieController::class);
    Route::get('/comment/movie/{id}', [CommentController::class, 'index']);
    Route::resource('/comment', CommentController::class);
    Route::get('/favourite/{slug}', [PageController::class, 'apiListFavourite']);
    Route::get('/episode/{slug}', [\App\Http\Controllers\Admin\MovieController::class, 'apiEpisode']);
    Route::get('/phim-hot', [\App\Http\Controllers\MovieController::class, 'apiPhimHot']);
    Route::get('/like/{movie_id}', [\App\Http\Controllers\PageController::class, 'apiUserLike']);
    Route::get('/count-like/{movie_id}', [\App\Http\Controllers\PageController::class, 'apiCounLikeMovie']);
    Route::get('/mua-phim-status/{slug}', [\App\Http\Controllers\PageController::class, 'apiTrangThaiMuaPhim']);
    Route::get('/luot-xem-bai-viet/{id}', [\App\Http\Controllers\PostController::class, 'apiLuotXemBaiViet']);
    Route::get('/luot-xem-tap-phim/{id}/{tap}', [\App\Http\Controllers\MovieController::class, 'apiTapPhim']);
    Route::get('/dem-thong-bao-loi', [\App\Http\Controllers\Admin\NotificationController::class, 'apiDemThongBaoLoiChuaFix']);
    Route::get('/danh-sach-thong-bao-loi', [\App\Http\Controllers\Admin\NotificationController::class, 'apiDanhSachBaoLoi']);
    Route::get('/danh-sach-thong-bao', [\App\Http\Controllers\AdminNotificationController::class, 'apiHienThiThongBaoTheoUser']);
    Route::get('/danh-sach-thong-bao-admin/{id}',[\App\Http\Controllers\Admin\Auth\MemberUserController::class,'apiHienDanhSachThongBao']);
    Route::get('/check-like-comment/{id}',[\App\Http\Controllers\CommentLikeController::class,'apiUserCommentLike']);


});

Route::get('/admin/login',[AdminUserController::class,'showFormLogin'])->name('admin.login');
Route::post('/admin/login',[AdminUserController::class,'login'])->name('admin.login');

   Route::middleware(['admin','CheckActiveAdmin'])->group(function (){
       Route::prefix('admin')
           ->as('admin.')
           ->group(function () {
               Route::prefix('movies')
                   ->as('movies.')
                   ->group(function () {
                       Route::get('thong-ke', [\App\Http\Controllers\Admin\MovieController::class, 'thongKe'])->name('thongKe');
                       Route::get('/', [\App\Http\Controllers\Admin\MovieController::class, 'index'])->name('index');
                       Route::get('create', [\App\Http\Controllers\Admin\MovieController::class, 'create'])->name('create');
                       Route::post('store', [\App\Http\Controllers\Admin\MovieController::class, 'store'])->name('store');
                       Route::get('{slug}/show', [\App\Http\Controllers\Admin\MovieController::class, 'show'])->name('show');
                       Route::get('{slug}/edit', [\App\Http\Controllers\Admin\MovieController::class, 'edit'])->name('edit');
                       Route::put('{slug}/update', [\App\Http\Controllers\Admin\MovieController::class, 'update'])->name('update');

                   });
               Route::get('catelogues/thong-ke',[\App\Http\Controllers\Admin\CatelogueController::class,'thongKe'])->name('catelogues.thongKe');
               Route::resource('catelogues', CatelogueController::class);
               Route::resource('members', MemberUserController::class);
               Route::get('thong-bao/{id}',[\App\Http\Controllers\Admin\Auth\MemberUserController::class,'thongBao'])->name('thongBao');
               Route::post('gui-thong-bao',[\App\Http\Controllers\Admin\Auth\MemberUserController::class,'guiThongBao'])->name('guiThongBao');

               Route::resource('admins', AdminUserController::class);

               Route::get('payments/thong-ke',[\App\Http\Controllers\Admin\PaymentController::class,'thongKe'])->name('payments.thongKe');
               Route::resource('payments', PaymentController::class);

               Route::get('bills/thong-ke',[\App\Http\Controllers\Admin\BillController::class,'thongKe'])->name('bills.thongKe');
               Route::resource('bills', BillController::class);

               Route::resource('catelogue-posts', CateloguePostController::class);
               Route::resource('posts', PostController ::class);
               Route::resource('tagposts', TagPostController ::class);
               Route::get('/',[\App\Http\Controllers\Admin\DashBoardController::class,'index'])->name('home');
               Route::get('/logout',[AdminUserController::class,'logout'])->name('logout');
               Route::get('lich-xu-giao-dich/{id}',[MemberUserController::class,'transactions'])->name('lich-xu-giao-dich');
               Route::get('khoa-tai-khoan/{id}',[MemberUserController::class,'khoaTaiKhoan'])->name('khoa-tai-khoan');
               Route::get('mo-tai-khoan/{id}',[MemberUserController::class,'moKhoaTaiKhoan'])->name('mo-tai-khoan');
               Route::get('loi-chua-fix',[\App\Http\Controllers\Admin\NotificationController::class,'index'])->name('loi-chua-fix');
               Route::post('fix-loi',[\App\Http\Controllers\Admin\NotificationController::class,'store'])->name('fix-loi');

               Route::get('comments/thong-ke',[\App\Http\Controllers\Admin\CommentController::class,'thongKe'])->name('comments.thongKe');
               Route::resource('comments', App\Http\Controllers\Admin\CommentController ::class);
               Route::get('thong-bao-admin/',[\App\Http\Controllers\Admin\AdminNotificationController::class,'index'])->name('thong-bao-admin');
               Route::get('thong-bao-admin/create',[\App\Http\Controllers\Admin\AdminNotificationController::class,'create'])->name('thong-bao-admin.create');
               Route::post('thong-bao-admin/store',[\App\Http\Controllers\Admin\AdminNotificationController::class,'store'])->name('thong-bao-admin.store');
               Route::resource('settings', App\Http\Controllers\Admin\SettingController ::class);

           });
   });


