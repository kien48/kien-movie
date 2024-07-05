@extends('admin.layouts.master')
@section('title')
    Thống kê doanh thu từng phim
@endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12 bg-light py-3">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0 text-dark">
                        <li class="breadcrumb-item"><a href="{{route('admin.movies.index')}}" class="nav-link">Danh sách phim</a></li>
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
            <th>Phim</th>
            <th>Doanh thu</th>
        </tr>
        </thead>
        <tbody>
        @foreach($thongKe as $item)
            <tr>
                <td>{{$item['ten']}}</td>
                <td>{{number_format($item['total'])}} xu</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
