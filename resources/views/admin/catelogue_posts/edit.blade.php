@extends('admin.layouts.master')
@section('title')
    Cập nhật danh mục bài viết
@endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12 bg-light py-3">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0 text-dark">
                        <li class="breadcrumb-item"><a href="{{route('admin.catelogue-posts.index')}}" class="nav-link">Danh sách danh mục bài viết</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div>
        <h1 class="text-center h3">Cập nhật danh mục bài viết</h1>
        <form action="{{route('admin.catelogue-posts.update',$model[0]['id'])}}" method="post">
            @csrf
            @method('PUT')
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
                <label class="form-label">Tên</label>
                <input type="text" name="ten" id="" class="form-control" value="{{$model[0]['ten']}}">
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-success">Gửi</button>
            </div>

        </form>
    </div>
@endsection
