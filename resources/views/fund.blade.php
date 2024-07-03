@extends('layouts.master')

@section('title')
    Quỹ phát triển
@endsection

@section('css')
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
        }
        .intro-section {
            background: #212121;
            padding: 50px 0;
        }
        .intro-section h1 {
            color: #ff4c4c;
        }
        .history-section {
            background: #121212;
            padding: 50px 0;
        }
        .history-table th {
            background-color: #ff4c4c;
            color: #ffffff;
        }
        .history-table td {
            background-color: #212121;
            color: #ffffff;
        }
        .btn-primary {
            background-color: #ff4c4c;
            border-color: #ff4c4c;
        }
        .btn-primary:hover {
            background-color: #ff3333;
            border-color: #ff3333;
        }
        .total-funds {
            font-size: 1.5em;
            color: #ff4c4c;
            margin-top: 20px;
        }
    </style>
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endsection

@section('content')
    <div class="container movie-section" style="margin-top: 100px;">
        <section class="intro-section text-center">
            <div class="container">
                <h1 class="display-4">Quỹ Trao Thưởng Phát Triển KienMovie</h1>
                <p class="lead">Quỹ trao thưởng này được tạo ra nhằm tôn vinh và trao thưởng cho những cá nhân đã có những đóng góp xuất sắc trong việc phát triển và xây dựng website xem phim online hoàn thiện hơn.</p>
                <hr class="my-4" style="border-color: #ff4c4c;">
                <p class="lead">Mục tiêu của quỹ là khuyến khích sự sáng tạo và nỗ lực không ngừng của các nhà phát triển, mang đến trải nghiệm tốt nhất cho người xem và cũng khuyến khích sự đóng góp của người dùng vào việc phát hiện lỗi của web phim.</p>
                <div class="total-funds">Tổng quỹ còn lại: {{ number_format($tongQuy[0]->tong_tien) }} xu</div>
            </div>
        </section>

        <!-- Lịch sử trao thưởng -->
        <section class="history-section">
            <div class="container">
                <h2 class="text-center" style="color: #ff4c4c;">Lịch Sử Trao Thưởng</h2>
                <div class="table-responsive">
                    <table id="example" class="table table-bordered table-hover history-table mt-4">
                        <thead>
                        <tr>
                            <th>Người dùng</th>
                            <th>Biến động số dư</th>
                            <th>Trước giao dịch</th>
                            <th>Sau giao dịch</th>
                            <th>Mô tả</th>
                            <th>Thời gian</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lichSuGiaoDich as $item)
                            <tr>
                                <td>{{ $item->user_id }}</td>
                                <td>{{ $item->bien_dong_so_du }}</td>
                                <td>{{ $item->truoc_giao_dich }}</td>
                                <td>{{ $item->sau_giao_dich }}</td>
                                <td>{{ $item->mo_ta }}</td>
                                <td>{{ $item->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection

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
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true,
                order: [[0, 'desc']]
            });
        });
    </script>
@endsection
