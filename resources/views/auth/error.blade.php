@extends('layouts.master')
@section('title')
    Nạp xu
@endsection
@section('content')
    <div class="container" style="margin-top: 100px;">
        <div class="card mt-4">
            <div class="card-header">
                Thất bại
            </div>
            <div class="card-body">
                <h3>Thanh toán thất bại</h3>
            </div>
            <div class="card-footer">
                <a href="{{route('home')}}" class="btn btn-danger">Về trang chủ</a>
            </div>
        </div>
    </div>
@endsection
