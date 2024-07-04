@extends('admin.layouts.master')
@section('title')
    Thống kê doanh thu từng phim
@endsection
@section('content')
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
                <td>{{$item['total']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
