@extends('layouts.master')
@section('title')
    Tài khoản
@endsection
@section('css')
    <style>
        .btn-custom {
            border-radius: 0;
            background-color: #e50914;
            border-color: #e50914;
        }

        .card {
            background-color: #333333;
            border: none;
        }

        .card-header {
            background-color: #444444;
        }

        .info-item {
            margin-bottom: 20px;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card mt-4">
                    <div class="card-header text-white">
                        Thông Tin Tài Khoản
                    </div>
                    <div class="card-body">
                        <p class="info-item text-white mt-3" ><strong>Số
                                Xu:</strong> {{isset($data['coin'][0]['coin']) ? number_format($data['coin'][0]['coin']) : 0}}
                            xu <a href="{{route('transactions')}}">Lịch sử giao dịch</a></p>
                        <p class="info-item text-white mt-3"><strong>Hạng Thành Viên:</strong> @if($data['is_vip'] ==1) VIP @else Thường @endif</p>
                        <a href="{{route('napXu')}}" class="btn btn-outline-primary mt-3 w-100 btn-lg">Nạp xu</a>
                        <a href="{{route('purchasedMovies')}}" class="btn btn-outline-success mt-3 w-100 btn-lg">Phim đã
                            mua</a>
                        <a href="" class="btn btn-outline-warning mt-3 w-100 btn-lg">Đổi mật khẩu</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                           class="btn btn-outline-danger mt-3 w-100 btn-lg">Đăng xuất</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
