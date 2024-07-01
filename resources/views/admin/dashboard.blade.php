@extends('admin.layouts.master')
@section('title')
    Trang DashBoard
@endsection
@section('css')
    <style>
        .slide-in-elliptic-top-fwd {
            -webkit-animation: slide-in-elliptic-top-fwd 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
            animation: slide-in-elliptic-top-fwd 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }
        @-webkit-keyframes slide-in-elliptic-top-fwd {
            0% {
                -webkit-transform: translateY(-600px) rotateX(-30deg) scale(0);
                transform: translateY(-600px) rotateX(-30deg) scale(0);
                -webkit-transform-origin: 50% 100%;
                transform-origin: 50% 100%;
                opacity: 0;
            }
            100% {
                -webkit-transform: translateY(0) rotateX(0) scale(1);
                transform: translateY(0) rotateX(0) scale(1);
                -webkit-transform-origin: 50% 1400px;
                transform-origin: 50% 1400px;
                opacity: 1;
            }
        }

        @keyframes slide-in-elliptic-top-fwd {
            0% {
                -webkit-transform: translateY(-600px) rotateX(-30deg) scale(0);
                transform: translateY(-600px) rotateX(-30deg) scale(0);
                -webkit-transform-origin: 50% 100%;
                transform-origin: 50% 100%;
                opacity: 0;
            }
            100% {
                -webkit-transform: translateY(0) rotateX(0) scale(1);
                transform: translateY(0) rotateX(0) scale(1);
                -webkit-transform-origin: 50% 1400px;
                transform-origin: 50% 1400px;
                opacity: 1;
            }
        }

        .dashboard-card {
            border-radius: 10px;
            color: white;
            margin: 10px;
        }

        .dashboard-card h3 {
            font-size: 1.5rem;
        }

        .dashboard-container {
            padding-top: 20px;
        }

        .chart-container {
            margin-top: 30px;
        }

        .recent-activities, .system-notifications {
            margin-top: 30px;
        }

        .recent-activities h4, .system-notifications h4 {
            margin-bottom: 20px;
        }

        .recent-activities ul, .system-notifications ul {
            list-style-type: none;
            padding-left: 0;
        }

        .recent-activities ul li, .system-notifications ul li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .recent-activities ul li:last-child, .system-notifications ul li:last-child {
            border-bottom: none;
        }
    </style>
@endsection
@section('content')
    <div class="container dashboard-container">
        <div class="row slide-in-elliptic-top-fwd">
            <div class="col-2 bg-danger d-flex justify-content-center align-items-center dashboard-card" style="height: 200px">
                <h3 class="text-center">Tổng số phim: {{$tongPhim}}</h3>
            </div>
            <div class="col-2 bg-warning d-flex justify-content-center align-items-center dashboard-card" style="height: 200px">
                <h3 class="text-center">Phim mới trong tuần: {{$phimMoiTuan}}</h3>
            </div>
            <div class="col-2 bg-success d-flex justify-content-center align-items-center dashboard-card" style="height: 200px">
                <h3 class="text-center">Tổng số lượt xem: {{$tongLuotXem}}</h3>
            </div>
            <div class="col-2 bg-primary d-flex justify-content-center align-items-center dashboard-card" style="height: 200px">
                <h3 class="text-center">Người dùng mới trong tuần: {{$thanhVienDangKyTuanNay}}</h3>
            </div>
            <div class="col-2 bg-secondary d-flex justify-content-center align-items-center dashboard-card" style="height: 200px">
                <h3 class="text-center">Admin mới trong tuần: {{$adminDangKyTuanNay}}</h3>
            </div>
            <div class="col-2 bg-info d-flex justify-content-center align-items-center dashboard-card" style="height: 200px">
                <h3 class="text-center">Tổng số bình luận: {{$tongBinhLuan}}</h3>
            </div>
            <div class="col-2 bg-dark  d-flex justify-content-center align-items-center dashboard-card" style="height: 200px">
                <h3 class="text-center">Tổng danh thu: {{number_format($tongDanhThu)}}đ</h3>
            </div>
        </div>

        <div class="row recent-activities slide-in-elliptic-top-fwd">
            <div class="col-6">
                <h4>Phim mới thêm</h4>
                <ul>
                    @foreach($phimMoiThem as $phim)
                        <li>{{$phim->ten}} - Thêm vào ngày {{$phim->created_at}}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-6">
                <h4>Người dùng mới đăng ký</h4>
                <ul>
                    @foreach($nguoiDungMoiDangKy as $user)
                        <li>{{$user->name}} - Thêm vào ngày {{$user->created_at}}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row recent-activities">
            <div class="col-6">
                <h4>Bình luận mới nhất</h4>
                <ul>
                    @foreach($binhLuanMoiNhat as $bl)
                        <li>{{$bl->user->name}}: {{$bl->content}} - Thêm vào ngày {{$bl->created_at}}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-6">
                <h4>Thông báo hệ thống</h4>
                <ul>
                    <li>Hệ thống sẽ bảo trì vào ngày 10/06/2024</li>
                    <li>Cập nhật phần mềm mới vào ngày 15/06/2024</li>
                    <li>Lỗi hệ thống đã được khắc phục vào ngày 20/06/2024</li>
                </ul>
            </div>
        </div>
    </div>
    @section('js')

    @endsection
@endsection

