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
        .dashboard-card:hover {
            cursor: pointer;
            transform: scale(1.1);
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
    <!-- start page title -->
    <div class="row">
        <div class="col-12 bg-light py-3">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0 text-dark">
                        <li class="breadcrumb-item"><a href="javascript:void(0);" class="nav-link">@yield('title')</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
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
            <div class="col-2 bg-light text-dark  d-flex justify-content-center align-items-center dashboard-card" data-bs-toggle="modal" data-bs-target="#myModal" style="height: 200px">
                <h3 class="text-center" >Tổng quỹ: {{number_format($tongQuy->tong_tien)}}đ
                <p>(click và để xem chi tiết)</p>
                </h3>

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
        </div>
    </div>
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-dark">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Lịch sử giao dịch quỹ</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                        <table id="example" class="w-100 table table-bordered table-hover history-table mt-4">
                            <thead>
                            <tr>
                                <th>Số thứ tự</th>
                                <th>Người dùng</th>
                                <th>Biến động số dư</th>
                                <th>Trước giao dịch</th>
                                <th>Sau giao dịch</th>
                                <th>Mô tả</th>
                                <th>Thời gian</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $dem = 1 @endphp
                            @foreach($lichSuGiaoDich as $item)
                                <tr>
                                    <td>{{$dem++}}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->bien_dong_so_du }}</td>
                                    <td>{{ $item->truoc_giao_dich }}</td>
                                    <td>{{ $item->sau_giao_dich }}</td>
                                    <td>{{ $item->mo_ta }}</td>
                                    <td>{{ $item->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    @section('js')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!--datatable js-->
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    responsive: true,
                    order: [[1, 'desc']]
                });
            });
        </script>
    @endsection
@endsection

