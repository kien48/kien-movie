@extends('admin.layouts.master');
@section('title')
    Thêm tài khoản Admin
@endsection
@section('muc')
    Thêm tài khoản Admin
@endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12 bg-light py-3">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0 text-dark">
                        <li class="breadcrumb-item"><a href="{{route('admin.admins.index')}}" class="nav-link">Danh sách tài khoản Admin</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div>
        <h1 class="text-center h3">Thêm tài khoản admin</h1>
        <form action="{{route('admin.admins.store')}}" method="post">
            @csrf

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
            @if(session('success'))
                <li class="text-success">{{session('success')}}</li>
            @endif
            @if(session('error'))
                <li class="text-danger">{{session('error')}}</li>
            @endif
            <div class="mt-3">
                <label class="form-label">Tên admin</label>
                <input type="text" name="name" id="" class="form-control">
            </div>
            <div class="mt-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" id="" class="form-control">
            </div>
            <div class="mt-3">
                <label class="form-label">Mật khẩu</label>
                <input type="text" name="password" id="" class="form-control">
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-success">Gửi</button>
            </div>

        </form>
    </div>
@endsection
