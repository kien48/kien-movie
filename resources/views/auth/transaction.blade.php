@extends('layouts.master')
@section('title')
    Nạp xu
@endsection
@section('content')
    <div class="container" style="margin-top: 100px;">
        <div class="card mt-4">
            <div class="card-header">
                Lịch sử giao dịch
            </div>
            <div class="card-body">
                <table class="table table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Xu trước giao dịch</th>
                        <th>Xu sau giao dịch</th>
                        <th>Biến động số dư</th>
                        <th>Mô tả</th>
                        <th>Ngày tạo</th>
                    </tr>
                    @foreach($data as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{number_format($item->truoc_giao_dich)}} xu</td>
                            <td>{{number_format($item->sau_giao_dich)}} xu</td>
                            <td>{{($item->bien_dong_so_du)}} xu</td>
                            <td>{{$item->mo_ta}}</td>
                            <td>{{$item->ngay_tao}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="card-footer">
                <a href="{{route('home')}}" class="btn btn-danger">Về trang chủ</a>
            </div>
        </div>
    </div>
@endsection

