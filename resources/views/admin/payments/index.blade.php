@extends('admin.layouts.master')
@section('title')
    Danh sách hóa đơn nạp xu
@endsection
@section('content')
    <div class="d-flex justify-content-between mt-3 mb-3">
        <h1 class="text-center h3">Danh sách hóa đơn nạp xu</h1>
    </div>
    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Số giao dịch</th>
            <th>ID Người dùng</th>
            <th>Người dùng</th>
            <th>Xu</th>
            <th>Phương thức thanh toán</th>
            <th>Tình trạng thanh toán</th>
            <th>Thời gian</th>
        </tr>
        </thead>

        <tbody>
        @foreach($data as $payment)
            @php
                    $table= "";
                  if($payment->tinh_trang_thanh_toan == 'Thất bại'){
                     $table = "table-danger";
                  }else{
                     $table = "table-success";
                  }
            @endphp
            <tr class="{{$table}}">
                <td>{{$payment->id}}</td>
                <td>{{$payment->so_giao_dich}}</td>
                <td>{{$payment->user_id}}</td>
                <td>{{$payment->user->name}}</td>
                <td>{{number_format($payment->xu)}} xu</td>
                <td>{{$payment->phuong_thuc_thanh_toan}}</td>
                <td>{{$payment->tinh_trang_thanh_toan}}</td>
                <td>{{$payment->created_at}}</td>
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


