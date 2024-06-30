@extends('admin.layouts.master')
@section('content')
    <div>
        <h1 class="text-center h3">Thêm dạnh mục bài viết</h1>
        <form action="{{route('admin.catelogue-posts.store')}}" method="post">
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
                <label class="form-label">Tên</label>
                <input type="text" name="ten" id="" class="form-control">
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-success">Gửi</button>
            </div>

        </form>
    </div>
@endsection
