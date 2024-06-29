@extends('layouts.master')
@section('title', 'Nạp xu')

@section('content')
    <div class="container" style="margin-top: 100px;">
        <div class="card mt-4">
            <div class="card-header">
                Lịch sử giao dịch
            </div>
            <div class="card-body">
                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Xu trước giao dịch</th>
                        <th>Xu sau giao dịch</th>
                        <th>Biến động số dư</th>
                        <th>Mô tả</th>
                        <th>Ngày tạo</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{number_format($item->truoc_giao_dich)}} xu</td>
                            <td>{{number_format($item->sau_giao_dich)}} xu</td>
                            <td>{{$item->bien_dong_so_du}} xu</td>
                            <td>{{$item->mo_ta}}</td>
                            <td>{{$item->ngay_tao}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="{{route('home')}}" class="btn btn-danger">Về trang chủ</a>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <!-- Datatable CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <!-- Datatable Responsive CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">
    <!-- Datatable Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endsection

@section('js')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Datatable JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <!-- Datatable Responsive JS -->
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <!-- PDFMake -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <!-- JSZip -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                order: [[5, 'desc']], // Sắp xếp theo cột ngày tạo giảm dần

            });
        });
    </script>
@endsection
