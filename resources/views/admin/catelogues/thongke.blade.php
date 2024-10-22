@extends('admin.layouts.master')

@section('title')
    Thống kê thể loại
@endsection

@section('content')

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Thể loại', 'Phim'],
                    @foreach($genreCounts as $value)
                ['{{ $value->ten }}', {{ $value->total }}],
                @endforeach
            ]);

            var options = {
                title: 'Thống kê số lượng phim theo thể loại'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
    <!-- start page title -->
    <div class="row">
        <div class="col-12 bg-light py-3">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0 text-dark">
                        <li class="breadcrumb-item"><a href="{{route('admin.catelogues.index')}}" class="nav-link">Danh sách thế loại</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div id="piechart" class="w-100" style="width: 900px; height: 500px;"></div>
@endsection
