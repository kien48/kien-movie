@extends('admin.layouts.master');
@section('title')
    Danh sách tài khoản người dùng
@endsection
@section('content')
    <div class="d-flex justify-content-between mt-3 mb-3">
        <h1 class="text-center h3">Danh sách tài khoản người dùng</h1>
    </div>
    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Thao tác</th>
        </tr>
        </thead>

        <tbody>
        @foreach($data as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td class="text-nowrap" style="width: 1px;">
                    <a href="http://" class="btn btn-outline-info">Xem</a>
                    <a href="http://" class="btn btn-outline-warning">Sửa</a>
                    <a href="http://" class="btn btn-outline-danger">Khóa</a>
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
                order: [[1, 'desc']]
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

