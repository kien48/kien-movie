@extends('admin.layouts.master')
@section('title')
    Danh sách bài viết
@endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12 bg-light py-3">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0 text-dark">
                        <li class="breadcrumb-item"><a href="javascript:void(0);" class="nav-link">@yield('title')</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="d-flex justify-content-between mt-3 mb-3">
        <h1 class="text-center h3">Danh sách bài viết</h1>
        <a href="{{route('admin.posts.create')}}" class="btn btn-primary">Thêm mới</a>
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
            <th>Tiêu đề</th>
            <th>Ảnh</th>
            <th>Lượt xem</th>
            <th>Người đăng</th>
            <th>Danh mục</th>
            <th>Thao tác</th>
        </tr>
        </thead>

        <tbody>
        @foreach($data as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->tieu_de}}</td>
                <td class="text-nowrap" style="width: 1px;">
                    <img src="{{\Storage::url($post->anh)}}" alt="" class="img-thumbnail" width="60px" alt="không có ảnh">
                </td>
                <td>{{$post->luot_xem}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->catelogue->ten}}</td>
                <td class="text-nowrap" style="width: 1px;">
                    <a href="{{route('admin.movies.show',$post->id)}}" class="btn btn-outline-info">Xem</a>
                    <a href="{{route('admin.posts.edit',$post->id)}}" class="btn btn-outline-warning">Sửa</a>
                    <form action="{{route('admin.posts.destroy',$post->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('xóa nhé')" class="btn btn-outline-danger" type="submit">Xóa</button>
                    </form>
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


