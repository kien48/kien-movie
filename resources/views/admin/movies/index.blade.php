@extends('admin.layouts.master')
@section('title')
    Danh sách phim
@endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12 bg-light py-3">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0 text-dark">
                        <li class="breadcrumb-item"><a href="javascript:void(0);" class="nav-link">Danh sách phim</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="d-flex justify-content-between mt-3 mb-3">
        <h1 class="text-center h3">Danh sách phim</h1>
        <div style="height: 50px;width: 150px;background-color: #ef4444;border-radius: 10px;">
            Có {{$countPhimDangCapNhat}} phim đang cập nhật
        </div>
        <div style="height: 50px;width: 150px;background-color: #20c997;border-radius: 10px;">
            Có {{$countPhimFull}} phim đã full
        </div>
        <div style="height: 50px;width: 150px;border-radius: 10px;" class=" bg-info">
            Có {{$countPhimSapChieu}} phim sắp chiếu
        </div>
        <a href="{{route('admin.movies.thongKe')}}" class="btn btn-info">Thống kê</a>
        <a href="{{route('admin.movies.create')}}" class="btn btn-primary">Thêm mới</a>
    </div>
    @if(session('success'))
        <li class="text-success">{{session('success')}}</li>
    @endif
    @if(session('error'))
        <li class="text-danger">{{session('error')}}</li>
    @endif
    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Danh sách</th>
            <th>Ảnh</th>
            <th>Ngôn ngữ</th>
            <th>Số tập</th>
            <th>Quốc gia</th>
            <th>Trạng thái</th>
            <th>Giá</th>
            <th>Vip</th>
            <th>Thao tác</th>
        </tr>
        </thead>

        <tbody>
        @foreach($data as $movie)
            @php
            $class = "table-danger";
            if($movie->trang_thai == 'Full'){
                $class = "table-success";
            }
            @endphp
            <tr class="{{$class}}">
                <td>{{$movie->id}}</td>
                <td>{{$movie->ten}}</td>
                <td>{{$movie->lists->ten}}</td>
                <td class="text-nowrap" style="width: 1px;">
                    <img src="{{$movie->anh}}" alt="" class="img-thumbnail" width="60px">
                </td>
                <td>{{$movie->ngon_ngu}}</td>
                <td>{{$movie->so_tap}}</td>
                <td>{{$movie->quoc_gia}}</td>
                <td>{{$movie->trang_thai}}</td>
                <td>{{$movie->gia}}</td>
                <td>{{$movie->is_vip}}</td>
                <td class="text-nowrap" style="width: 1px;">
                    <a href="{{route('admin.movies.show',$movie->slug)}}" class="btn btn-outline-info">Xem</a>
                    <a href="{{route('admin.movies.edit',$movie->slug)}}" class="btn btn-outline-warning">Sửa</a>
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
