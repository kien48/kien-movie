<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Quản trị KienMovie</title>
    <link rel="shortcut icon"
          href="https://cdn.vietnambiz.vn/171464876016439296/2020/7/16/image016-450x450-15948916952371476858384.png"
          type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('/')}}/themes/web phim/public/styleadmin.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/')}}/themes/web phim/public/angular.js"></script>
    <script src="{{asset('/')}}/themes/web phim/public/font-fontawesome-ae333ffef2.js"></script>
    @yield('css')
    <style>
        #loading-screen {
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: black;
            color: red;
            font-size: 2em;
            z-index: 1000;
        }
        ::-webkit-scrollbar {
            width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #9ca3af;
            border-radius: 10px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #b30000;
        }
    </style>
</head>

<body ng-app="myApp" ng-controller="myCtrl">
<div id="loading-screen"></div>

<nav class="navbar navbar-expand-lg navbar-dark" style="margin-top: -10px">
    <div class="container-fluid header">
        <a class="navbar-brand" href="#">KienMovie</a>
        <div class="d-flex">
            <a href="{{route('admin.loi-chua-fix')}}" class="text-white nav-link"><i class="h3 fa-solid fa-bell"></i>
                <span class="badge rounded-pill bg-warning " style="margin-left: -10px">@{{ count }}</span>
            </a>
            <div class="dropdown ms-3">
                <button type="button" class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown">
                    {{session('admin')->name}}
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Thông tin tài khoản</a></li>
                    <li><a class="dropdown-item" href="{{route('admin.logout')}}">Đăng xuất</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-3 sidebar">
            <div class="container mt-3">
                <h2>Menu</h2>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link @if(Str::contains(Route::currentRouteName(), 'admin.home')) active @endif" href="{{ route('admin.home') }}">Trang DashBoard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(Str::contains(Route::currentRouteName(), 'admin.movies')) active @endif" href="{{ route('admin.movies.index') }}">Phim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(Str::contains(Route::currentRouteName(), 'admin.catelogues')) active @endif" href="{{ route('admin.catelogues.index') }}">Thể loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(Str::contains(Route::currentRouteName(), 'admin.posts')) active @endif" href="{{ route('admin.posts.index') }}">Bài viết</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(Str::contains(Route::currentRouteName(), 'admin.catelogue-posts')) active @endif" href="{{ route('admin.catelogue-posts.index') }}">Danh mục bài viết</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(Str::contains(Route::currentRouteName(), 'admin.tagposts')) active @endif" href="{{ route('admin.tagposts.index') }}">Tag bài viết</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(Str::contains(Route::currentRouteName(), 'admin.payments')) active @endif" href="{{ route('admin.payments.index') }}">Lịch sử nạp xu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(Str::contains(Route::currentRouteName(), 'admin.bills')) active @endif" href="{{ route('admin.bills.index') }}">Hóa đơn mua phim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(Str::contains(Route::currentRouteName(), 'admin.comments')) active @endif" href="{{ route('admin.comments.index') }}">Bình luận</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(Str::contains(Route::currentRouteName(), 'admin.thong-bao-admin')) active @endif" href="{{ route('admin.thong-bao-admin') }}">Gửi thông báo</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Tài khoản</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item @if(Str::contains(Route::currentRouteName(), 'admin.admins')) active @endif" href="{{ route('admin.admins.index') }}">Admin</a></li>
                            <li><a class="dropdown-item @if(Str::contains(Route::currentRouteName(), 'admin.members')) active @endif" href="{{ route('admin.members.index') }}">Member</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(Str::contains(Route::currentRouteName(), 'admin.settings')) active @endif" href="{{ route('admin.settings.edit',1) }}">Cài đặt</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="col-9 content" ng-controller="viewCtrl">
            <div>
                <div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var loader = document.getElementById("loading-screen");
        window.addEventListener("load", function() {
            loader.style.transition = "opacity 1s";
            loader.style.opacity = 0;
            setTimeout(function() {
                loader.style.display = "none";
            }, 1000);
        });
    });
    var myApp = angular.module('myApp',[])
    myApp.controller('myCtrl',function ($scope,$http){
        $scope.count = 0;
        $scope.loadLoi = ()=>{
            $http.get('http://movie.test/api/dem-thong-bao-loi')
                .then(function (res){
                    $scope.count = res.data.data
                })
        }
        $scope.loadLoi()
        setInterval($scope.loadLoi,5000)
    })
    var viewFunction = ($scope,$http)=>{

    }
</script>
@yield('js')
<script>
    myApp.controller('viewCtrl',viewFunction)
</script>
</body>

</html>
