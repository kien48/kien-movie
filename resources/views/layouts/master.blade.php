<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | KienMovie</title>
    <link rel="shortcut icon" href="https://cdn.vietnambiz.vn/171464876016439296/2020/7/16/image016-450x450-15948916952371476858384.png" type="image/x-icon">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/helvetica-neue-55" rel="stylesheet">
    <script src="{{asset('/')}}/themes/web phim/public/font-fontawesome-ae333ffef2.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{asset('/')}}/themes/web phim/public/style.css">
    <script src="{{asset('/')}}/themes/web phim/public/angular.js"></script>
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

<header id="trangchu">
    <nav class="navbar navbar-expand-lg navbar- fixed-top shadow fw-bold" style="backdrop-filter: blur(10px);">
        <div class="container">
            <a class="navbar-brand bounce-in-top" href="{{route('home')}}">KienMovie</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" style="margin-left: 10px;">
                    @if(Route::CurrentRouteName() == "home")
                        <li class="nav-item">
                            <a class="nav-link" href="#phimle">Phim lẻ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#phimbo">Phim bộ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tv">TV Shows</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#phimsapchieu">Phim sắp chiếu</a>
                        </li>
                    @else
                        @foreach($lists as $key=>$value)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('lists',$key)}}">{{$value}}</a>
                            </li>
                        @endforeach
                    @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('quy-phat-trien')}}">Quỹ phát triển</a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('blogs')}}">Blogs</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('search')}}">
                            <button class="btn btn-outline-light border-0"><i class="fa-solid fa-magnifying-glass h4"></i></button>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="{{route('favourite')}}">
                            <button class="btn btn-outline-danger border-0"><i class="fa-regular fa-heart h4"></i>
                            </button>
                        </a>
                    </li>
                    @if(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link " href="">
                                <button class="btn btn-outline-light border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo1"><i class="fa-regular fa-envelope h4"></i>
                                    <span class="badge rounded-pill bg-warning " style="margin-left: -10px">@{{ demThongBao }}</span>
                                </button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('index')}}">
                                <button class="btn @if(Auth::user()->is_vip == 1) btn-outline-warning @else btn-outline-light @endif">
                                    <i class="fa-solid fa-user"></i> {{Auth::user()->name}} </button>
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('register')}}">
                                <button class="btn btn-outline-warning"><i class="fa-solid fa-user-plus"></i> Đăng ký
                                </button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('login')}}">
                                <button class="btn btn-danger"><i class="fa-regular fa-user"></i> Đăng nhập</button>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="offcanvas offcanvas-end text-bg-dark" id="demo1">
    <div class="offcanvas-header">
        <h1 class="offcanvas-title">Thông báo từ Admin</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <div ng-repeat="thongBao in danhSachThongBao" class="admin-message mb-3" style="background-color: #343a40; border-radius: 10px; padding: 15px;  align-items: center;">
            <p style="; color: #fff;">@{{ thongBao.noi_dung }}</p>
            <p style=" color: #fff;">@{{ thongBao.created_at | date:'HH:mm dd/MM/yyyy' }}</p>
            <button ng-click="daDoc(thongBao.id)" class="btn btn-danger" style="margin-left: 10px;">Đã đọc</button>
        </div>

    </div>
</div>
<div style="min-height: calc(100vh - 315px);margin-top: 90px;" ng-controller="viewCtrl">
    @yield('content')
</div>
<footer class="bg-gray-900 text-white py-4">
    <div class="container mx-auto px-4">
        <hr class="border-gray-600 mb-4">
        <ul class="flex justify-center mt-3">
            @foreach($postFooter as $post)
                <li class="mr-6">
                    <a href="{{route('chitiet',$post->slug)}}" class="hover:text-gray-400">{{$post->tieu_de}}</a>
                </li>
            @endforeach
        </ul>
        <hr class="border-gray-600 mb-4">
        <p class="text-sm mb-2">&copy; 2024 KienMovie. All rights reserved.</p>
    </div>
</footer>

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

    var myApp = angular.module('myApp', [])
    myApp.controller('myCtrl', function($http, $scope) {
        $scope.danhSachThongBao = [];
        $scope.demThongBao = '';
        $scope.getThongBao = () =>{
            $http.get('http://movie.test/api/danh-sach-thong-bao')
                .then(function (res){
                    $scope.danhSachThongBao = res.data.data
                    $scope.demThongBao = res.data.data.length
                })
        }
        $scope.getThongBao()
        setInterval($scope.getThongBao,5000)
        $scope.daDoc = (id) =>{
            $http.post('{{route('daDoc')}}',{
                'id': id
            }).then(function (res){
                $scope.getThongBao()
                $scope.demThongBao = res.data.data
            })
        }
    })

    var viewFunction = function($scope) {};
</script>
@yield('js')
<script>
    myApp.controller('viewCtrl', viewFunction);
</script>

</body>

</html>
