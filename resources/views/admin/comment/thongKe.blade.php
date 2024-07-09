@extends('admin.layouts.master')
@section('title')
    Thống kê người dùng bình luận
@endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12 bg-light py-3">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0 text-dark">
                        <li class="breadcrumb-item"><a href="{{route('admin.comments.index')}}" class="nav-link"> Danh sách bình luận
                            </a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <table class="table">
        <thead>
        <tr>
            <th>ID Người dùng</th>
            <th>Tên người dùng</th>
            <th>Tổng số bình luận</th>
            <th>Sao trung bình</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr>
                <td>{{$item['user_id']}}</td>
                <td>{{$item['user_name']}}</td>
                <td>{{$item['count']}}</td>
                <td>{{number_format($item['avg_sao'],1)}} sao</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection