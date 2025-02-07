@extends('admin.layouts.master');
@section('title')
    Danh sách tài khoản người dùng
@endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12 bg-light py-3">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0 text-dark">
                        <li class="breadcrumb-item"><a href="javascript:void(0);" class="nav-link">Danh sách tài khoản người dùng</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="d-flex justify-content-between mt-3 mb-3">
        <h1 class="text-center h3">Danh sách tài khoản người dùng</h1>
    <div style="height: 50px;width: 150px;border-radius: 10px;" class="bg-info">
        Có tổng {{$demTong}} tài khoản
    </div>
    <div style="height: 50px;width: 150px;border-radius: 10px;" class="bg-warning">
        Có {{$demVip}} tài khoản vip
    </div>
        <div style="height: 50px;width: 150px;border-radius: 10px;" class="bg-danger">
            Có {{$demKhoa}} tài khoản bị khóa active
        </div>
        <div style="height: 50px;width: 150px;border-radius: 10px;" class="bg-secondary">
            Có {{$demSpam}} tài khoản bị khóa spam
        </div>
    </div>
    @if(session('error'))
        <li class="text-danger">{{session('error')}}</li>
    @endif
    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Số xu còn lại</th>
            <th>Loại tài khoản</th>
            <th>Spam</th>
            <th>Trạng thái khóa</th>
            <th>Thao tác</th>
        </tr>
        </thead>

        <tbody>
        @foreach($data as $admin)
            @php
                $class = '';
                $vip = "Thường";
                if($admin->is_vip == 1){
                    $class = 'table-warning';
                    $vip = "Vip";
                }
                $status = 'Không';
                if($admin->is_active == 1){
                    $status = 'Đang bị khóa';
                    $class = 'table-danger';
                }
                $spam = 'Không';
                if($admin->is_spam == 1){
                    $spam = 'Có';
                    $class = 'table-secondary';
                }
            @endphp
            <tr class="{{$class}}">
                <td>{{$admin->id}}</td>
                <td>{{$admin->name}}</td>
                <td>{{$admin->email}}</td>
                <td>{{number_format($admin->coin[0]->coin)}} xu</td>
                <td>{{$vip}}</td>
                <td>{{$spam}}</td>
                <td>{{$status}}</td>
                <td class="text-nowrap" style="width: 1px;">
                    <a href="{{route('admin.thongBao',$admin->id)}}" class="btn btn-outline-dark">Thông báo</a>
                    <a href="{{route('admin.lich-xu-giao-dich',$admin->id)}}" class="btn btn-outline-info">Xem lịch sử giao dịch</a>
                    @if($admin->is_active==0)
                        <a href="{{route('admin.khoa-tai-khoan',$admin->id)}}" class="btn btn-outline-danger">Khóa</a>
                        @else
                    <a href="{{route('admin.mo-tai-khoan',$admin->id)}}" class="btn btn-outline-warning">Mở khóa</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
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
            new DataTable('#example', {
                order: [[0, 'desc']]
            });
        </script>
    @endsection
    @section('css')
        <!--datatable css-->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
        <!--datatable responsive css-->
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    @endsection
@endsection

