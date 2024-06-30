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
            <div class="col-3 bg-danger d-flex justify-content-center align-items-center dashboard-card" style="height: 200px">
                <h3 class="text-center">Tổng số phim: {{$tongPhim}}</h3>
            </div>
            <div class="col-3 bg-warning d-flex justify-content-center align-items-center dashboard-card" style="height: 200px">
                <h3 class="text-center">Phim mới trong tháng: {{$phimMoiTuan}}</h3>
            </div>
            <div class="col-3 bg-success d-flex justify-content-center align-items-center dashboard-card" style="height: 200px">
                <h3 class="text-center">Tổng số lượt xem: {{$tongLuotXem}}</h3>
            </div>
            <div class="col-3 bg-primary d-flex justify-content-center align-items-center dashboard-card" style="height: 200px">
                <h3 class="text-center">Người dùng mới trong tuần: {{$thanhVienDangKyTuanNay}}</h3>
            </div>
            <div class="col-3 bg-secondary d-flex justify-content-center align-items-center dashboard-card" style="height: 200px">
                <h3 class="text-center">Admin mới trong tuần: {{$adminDangKyTuanNay}}</h3>
            </div>
            <div class="col-3 bg-info d-flex justify-content-center align-items-center dashboard-card" style="height: 200px">
                <h3 class="text-center">Tổng số bình luận: {{$tongBinhLuan}}</h3>
            </div>
        </div>

        <div class="row chart-container">
            <div class="col-6">
                <canvas id="viewChart"></canvas>
            </div>
            <div class="col-6">
                <canvas id="userChart"></canvas>
            </div>
        </div>

        <div class="row recent-activities">
            <div class="col-6">
                <h4>Phim mới thêm</h4>
                <ul>
                    <li>Phim A - Thêm vào ngày 01/06/2024</li>
                    <li>Phim B - Thêm vào ngày 02/06/2024</li>
                    <li>Phim C - Thêm vào ngày 03/06/2024</li>
                </ul>
            </div>
            <div class="col-6">
                <h4>Người dùng mới đăng ký</h4>
                <ul>
                    <li>Người dùng A - Đăng ký ngày 01/06/2024</li>
                    <li>Người dùng B - Đăng ký ngày 02/06/2024</li>
                    <li>Người dùng C - Đăng ký ngày 03/06/2024</li>
                </ul>
            </div>
        </div>

        <div class="row recent-activities">
            <div class="col-6">
                <h4>Bình luận mới nhất</h4>
                <ul>
                    <li>Người dùng A: "Bình luận A" - Phim A - 01/06/2024</li>
                    <li>Người dùng B: "Bình luận B" - Phim B - 02/06/2024</li>
                    <li>Người dùng C: "Bình luận C" - Phim C - 03/06/2024</li>
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
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Biểu đồ lượt xem phim
        var ctx = document.getElementById('viewChart').getContext('2d');
        var viewChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Lượt xem phim',
                    data: [1200, 1900, 3000, 5000, 2000, 3000],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Biểu đồ người dùng mới đăng ký
        var ctx2 = document.getElementById('userChart').getContext('2d');
        var userChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Người dùng mới đăng ký',
                    data: [500, 700, 800, 1200, 900, 1400],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
