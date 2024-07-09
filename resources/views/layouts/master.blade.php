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
@include('layouts.menu')
<div class="offcanvas offcanvas-end text-bg-dark" id="demo1">
    <div class="offcanvas-header">
        <h1 class="offcanvas-title">Thông báo từ Admin</h1>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <div ng-if="danhSachThongBao.length == 0" style="color: #fff;">Không có thông báo</div>
        <div ng-repeat="thongBao in danhSachThongBao" class="admin-message mb-3" style="background-color: #343a40; border-radius: 10px; padding: 15px;  align-items: center;">
            <p style="; color: #fff;">@{{ thongBao.noi_dung }}</p>
            <p style=" color: #fff;">@{{ thongBao.created_at | date:'HH:mm dd/MM/yyyy' }}</p>
            <button ng-show="thongBao.noi_dung == 'Tài khoản của bạn đã thực hiện 3 lần spam nếu thực hiện hơn sẽ bị khóa tài khoản hoặc bị trừ 5000 xu'" class="btn btn-danger" style="margin-left: 10px;">Không thể xóa</button>
            <button ng-show="thongBao.noi_dung != 'Tài khoản của bạn đã thực hiện 3 lần spam nếu thực hiện hơn sẽ bị khóa tài khoản hoặc bị trừ 5000 xu'" ng-click="daDoc(thongBao.id)" class="btn btn-danger" style="margin-left: 10px;">Đã đọc</button>

        </div>

    </div>
</div>
<div style="min-height: calc(100vh - 315px);margin-top: 90px;" ng-controller="viewCtrl">
    @yield('content')
</div>
@include('layouts.footer')
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
