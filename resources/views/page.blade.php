@extends('layouts.master')
@section('title')
    Trang chủ
@endsection
@section('css')
    <style>
        body {
            background-color: #000;
        }

        .video-container {
            position: relative;
            width: 100%;
            height: 30vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .video-container video {
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
        }

        .video-container .content {
            position: absolute;
            z-index: 2;
            text-align: center;
            color: #fff;
            width: 100%;
        }

        .video-container .content h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .video-container .content p {
            font-size: 1.2rem;
            margin: 10px 0;
        }

        .video-container .content .buttons {
            margin-top: 20px;
        }

        .video-container .content .buttons .btn {
            margin: 5px;
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
        }

        .video-container .content .buttons .btn-play {
            background-color: #1c1c1c;
        }

        .video-container .content .buttons .btn-details {
            background-color: #4a4a4a;
        }

        .movie-section {
            padding: 20px;
        }

        .movie-section h2 {
            color: #fff;
            margin-bottom: 20px;
        }

        .movie-section .movie-card {
            margin-bottom: 20px;
        }

        .movie-section .movie-card img {
            border-radius: 10px;
        }

        .movie-section .badge {
            font-size: 0.8rem;
            padding: 5px 10px;
        }

        .nav-link {
            color: #fff;
        }

        .nav-link:hover {
            color: #ddd;
        }

        .movie-card-inner {
            position: relative;
        }

        .order-number {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: rgba(255, 69, 0, 0.8);
            color: white;
            padding: 6px 12px;
            border-radius: 50%;
            font-size: 16px;
            font-weight: bold;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .movie-card:hover .order-number {
            opacity: 1;
        }


    </style>
@endsection
@section('content')
    <!-- Carousel -->
    <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container-fluid video-container">
                    <video src="{{\Storage::url($banner[0]->banner_video)}}" autoplay muted></video>
                    <div class="content">
                        <h1>{{$banner[0]->tieu_de}}</h1>
                        <p>{{$banner[0]->noi_dung}}</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container-fluid video-container">
                    <video src="{{\Storage::url($banner[0]->banner_video_2)}}" autoplay muted></video>
                    <div class="content">
                        <h1>{{$banner[0]->tieu_de_2}}</h1>
                        <p>{{$banner[0]->noi_dung_2}}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    <div class="container movie-section">
        <div class="row mb-5">
            <div class="col mb-1">
                <div id="phimmoithem" class="d-flex justify-content-between" style="padding-top: 20px">
                    <h1 class="text-warning" style="font-weight: 700">Phim mới thêm</h1>
                </div>
                <div class="row">
                    @foreach($dataPhimMoiThem as $data)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 movie-card mb-3 mt-3">
                            <a href="{{ route('detail', $data->slug) }}" class="nav-link position-relative"
                               data-bs-toggle="tooltip" title="{{ $data->ten }}">
                                <img src="{{$data->anh}}" alt="" class="img-fluid" width="200px">
                                @if($data->gia >= 1)
                                    <span class="badge bg-danger rounded-0 position-absolute top-0 end-0">
                                     <i class="fa-solid fa-crown"></i> Có phí
                                    </span>
                                @elseif($data->is_vip == true)
                                    <span class="badge bg-warning rounded-0 position-absolute top-0 end-0">
                                     <i class="fa-solid fa-crown"></i> Vip
                                    </span>
                                @endif
                                @if($data->trang_thai == 'Full')
                                    @php $class= "danger" @endphp
                                @elseif($data->lists->ten =="Phim sắp chiếu")
                                    @php $class= "info" @endphp
                                @else
                                    @php $class= "success" @endphp
                                @endif
                                <span class="badge bg-{{$class}} rounded-0 position-absolute bottom-0 start-0">
                                    @if($data->trang_thai == 'Full')
                                        Full
                                    @elseif($data->lists->ten =="Phim sắp chiếu")
                                        Phim sắp chiếu
                                    @else
                                        Đang chiếu
                                    @endif
                                </span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col mb-1">
                <div id="" class="d-flex justify-content-between" style="padding-top: 72px">
                    <h2 class="text-warning" style="font-weight: 700">Top 6 phim nhiều lượt thích nhất</h2>
                </div>
                <div class="row">
                    <div ng-repeat="data in phimHot" class="col-6 col-sm-4 col-md-3 col-lg-2 movie-card mb-3 mt-3">
                        <a href="detail/@{{ data.slug }}" class="nav-link position-relative" data-bs-toggle="tooltip"
                           title="@{{ data.ten }}">
                            <img src="@{{ data.anh }}" alt="" class="img-fluid" width="200px">
                            <span ng-show="data.gia >= 1" class="badge bg-danger rounded-0 position-absolute top-0 end-0">
                <i class="fa-solid fa-crown"></i> Có phí
            </span>
                            <span ng-show="data.is_vip == true" class="badge bg-warning rounded-0 position-absolute top-0 end-0">
                <i class="fa-solid fa-crown"></i> Vip
            </span>
                            <span ng-if="data.trang_thai == 'Full'" class="badge bg-danger rounded-0 position-absolute bottom-0 start-0">
                Full
            </span>
                            <span ng-if="data.lists.ten == 'Phim sắp chiếu'" class="badge bg-info rounded-0 position-absolute bottom-0 start-0">
                Phim sắp chiếu
            </span>
                            <span ng-if="data.trang_thai != 'Full' && data.lists.ten != 'Phim sắp chiếu'" class="badge bg-success rounded-0 position-absolute bottom-0 start-0">
                Đang chiếu
            </span>
                            <span class="order-number">@{{ $index + 1 }}</span>
                        </a>
                    </div>
                </div>

            </div>
        <div class="row mb-4">
            <div class="col mb-1">
                <div id="phimle" class="d-flex justify-content-between" style="padding-top: 72px">
                    <h2 class="text-warning" style="font-weight: 700">Phim lẻ</h2>
                    <a href="{{route('lists',1)}}" class="nav-link"><h4>Xem thêm</h4></a>
                </div>
                <div class="row">
                    @foreach($dataPhimLe as $data)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 movie-card mb-3 mt-3">
                            <a href="{{ route('detail', $data->slug) }}" class="nav-link position-relative"
                               data-bs-toggle="tooltip" title="{{ $data->ten }}">
                                <img src="{{$data->anh}}" alt="" class="img-fluid" width="200px">
                                @if($data->gia >= 1)
                                    <span class="badge bg-danger rounded-0 position-absolute top-0 end-0">
                                     <i class="fa-solid fa-crown"></i> Có phí
                                    </span>
                                @elseif($data->is_vip == true)
                                    <span class="badge bg-warning rounded-0 position-absolute top-0 end-0">
                                     <i class="fa-solid fa-crown"></i> Vip
                                    </span>
                                @endif
                                @if($data->trang_thai == 'Full')
                                    @php $class= "danger" @endphp
                                @elseif($data->lists->ten =="Phim sắp chiếu")
                                    @php $class= "info" @endphp
                                @else
                                    @php $class= "success" @endphp
                                @endif
                                <span class="badge bg-{{$class}} rounded-0 position-absolute bottom-0 start-0">
                                    @if($data->trang_thai == 'Full')
                                        Full
                                    @elseif($data->lists->ten =="Phim sắp chiếu")
                                        Phim sắp chiếu
                                    @else
                                        Đang chiếu
                                    @endif
                                </span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col mb-1">
                <div id="phimbo" class="d-flex justify-content-between " style="padding-top: 72px">
                    <h2 class="text-warning" style="font-weight: 700">Phim bộ</h2>
                    <a href="{{route('lists',2)}}" class="nav-link"><h4>Xem thêm</h4></a>
                </div>
                <div class="row">
                    @foreach($dataPhimBo as $data)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 movie-card mb-3 mt-3">
                            <a href="{{ route('detail', $data->slug) }}" class="nav-link position-relative"
                               data-bs-toggle="tooltip" title="{{ $data->ten }}">
                                <img src="{{$data->anh}}" alt="" class="img-fluid" width="200px">
                                @if($data->gia >= 1)
                                    <span class="badge bg-danger rounded-0 position-absolute top-0 end-0">
                                     <i class="fa-solid fa-crown"></i> Có phí
                                    </span>
                                @elseif($data->is_vip == true)
                                    <span class="badge bg-warning rounded-0 position-absolute top-0 end-0">
                                     <i class="fa-solid fa-crown"></i> Vip
                                    </span>
                                @endif
                                @if($data->trang_thai == 'Full')
                                    @php $class= "danger" @endphp
                                @elseif($data->lists->ten =="Phim sắp chiếu")
                                    @php $class= "info" @endphp
                                @else
                                    @php $class= "success" @endphp
                                @endif
                                <span class="badge bg-{{$class}} rounded-0 position-absolute bottom-0 start-0">
                                    @if($data->trang_thai == 'Full')
                                        Full
                                    @elseif($data->lists->ten =="Phim sắp chiếu")
                                        Phim sắp chiếu
                                    @else
                                        Đang chiếu
                                    @endif
                                </span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col mb-1">
                <div id="tv" class="d-flex justify-content-between" style="padding-top: 72px">
                    <h2 class="text-warning" style="font-weight: 700">TV Shows</h2>
                    <a href="{{route('lists',3)}}" class="nav-link"><h4>Xem thêm</h4></a>
                </div>
                <div class="row">
                    @foreach($dataTvShows as $data)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 movie-card mb-3 mt-3">
                            <a href="{{ route('detail', $data->slug) }}" class="nav-link position-relative"
                               data-bs-toggle="tooltip" title="{{ $data->ten }}">
                                <img src="{{$data->anh}}" alt="" class="img-fluid" width="200px">
                                @if($data->gia >= 1)
                                    <span class="badge bg-danger rounded-0 position-absolute top-0 end-0">
                                     <i class="fa-solid fa-crown"></i> Có phí
                                    </span>
                                @elseif($data->is_vip == true)
                                    <span class="badge bg-warning rounded-0 position-absolute top-0 end-0">
                                     <i class="fa-solid fa-crown"></i> Vip
                                    </span>
                                @endif
                                @if($data->trang_thai == 'Full')
                                    @php $class= "danger" @endphp
                                @elseif($data->lists->ten =="Phim sắp chiếu")
                                    @php $class= "info" @endphp
                                @else
                                    @php $class= "success" @endphp
                                @endif
                                <span class="badge bg-{{$class}} rounded-0 position-absolute bottom-0 start-0">
                                    @if($data->trang_thai == 'Full')
                                        Full
                                    @elseif($data->lists->ten =="Phim sắp chiếu")
                                        Phim sắp chiếu
                                    @else
                                        Đang chiếu
                                    @endif
                                </span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col mb-1">
                <div id="phimsapchieu" class="d-flex justify-content-between" style="padding-top: 72px">
                    <h2 class="text-warning" style="font-weight: 700">Phim sắp chiếu</h2>
                    <a href="{{route('lists',6)}}" class="nav-link"><h4>Xem thêm</h4></a>
                </div>
                <div class="row">
                    @foreach($dataPhimSapChieu as $data)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 movie-card mb-3 mt-3">
                            <a href="{{ route('detail', $data->slug) }}" class="nav-link position-relative"
                               data-bs-toggle="tooltip" title="{{ $data->ten }}">
                                <img src="{{$data->anh}}" alt="" class="img-fluid" width="200px">
                                @if($data->gia >= 1)
                                    <span class="badge bg-danger rounded-0 position-absolute top-0 end-0">
                                     <i class="fa-solid fa-crown"></i> Có phí
                                    </span>
                                @elseif($data->is_vip == true)
                                    <span class="badge bg-warning rounded-0 position-absolute top-0 end-0">
                                     <i class="fa-solid fa-crown"></i> Vip
                                    </span>
                                @endif
                                @if($data->trang_thai == 'Full')
                                    @php $class= "danger" @endphp
                                @elseif($data->lists->ten =="Phim sắp chiếu")
                                    @php $class= "info" @endphp
                                @else
                                    @php $class= "success" @endphp
                                @endif
                                <span class="badge bg-{{$class}} rounded-0 position-absolute bottom-0 start-0">
                                    @if($data->trang_thai == 'Full')
                                        Full
                                    @elseif($data->lists->ten =="Phim sắp chiếu")
                                        Phim sắp chiếu
                                    @else
                                        Đang chiếu
                                    @endif
                                </span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @section('js')
        <script>
            viewFunction = ($scope, $http) => {
                $scope.phimHot = []
                $scope.getPhimHot = () => {
                    $http.get('http://movie.test/api/phim-hot')
                        .then(function (response) {
                            $scope.phimHot = response.data.data
                            console.log($scope.phimHot)
                        })
                        .catch(function (error) {
                            console.error(error);
                        });
                }
                $scope.getPhimHot()
                setInterval($scope.getPhimHot, 1000)
            }
        </script>
    @endsection
@endsection
