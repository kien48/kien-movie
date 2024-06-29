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

    </style>
@endsection
@section('content')
    <div class="container-fluid video-container">
        <video src="{{ asset('/') }}/themes/web phim/public/img/video.mp4" autoplay muted></video>
        <div class="content">
            <h1>君の名は。</h1>
            <p>Mitsuha Miyamizu, một nữ sinh trung học, khao khát được sống cuộc sống của một cậu bé ở thành phố Tokyo nhộn nhịp...</p>
        </div>
    </div>
    <div class="container movie-section" >
        <div class="row mb-5">
            <div class="col mb-1">
                <div id="phimmoithem" class="d-flex justify-content-between" style="padding-top: 20px">
                    <h2>Phim mới thêm</h2>
                </div>
                <div class="row">
                    @foreach($dataPhimMoiThem as $data)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 movie-card mb-3 mt-3">
                            <a href="{{ route('detail', $data->slug) }}" class="nav-link position-relative"
                               data-bs-toggle="tooltip" title="{{ $data->ten }}">
                                <img src="{{$data->anh}}" alt="" class="img-fluid">
                                @if($data->gia >= 1)
                                    <span class="badge bg-danger rounded-pill position-absolute top-0 end-0">
                                     <i class="fa-solid fa-crown"></i> Có phí
                                    </span>
                                @elseif($data->is_vip == true)
                                    <span class="badge bg-warning rounded-pill position-absolute top-0 end-0">
                                     <i class="fa-solid fa-crown"></i> Vip
                                    </span>
                                @endif
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col mb-1">
                <div id="phimle" class="d-flex justify-content-between" style="padding-top: 72px">
                    <h2>Phim lẻ</h2>
                    <a href="{{route('lists',1)}}" class="nav-link"><h4>Xem thêm</h4></a>
                </div>
                <div class="row">
                    @foreach($dataPhimLe as $data)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 movie-card mb-3 mt-3">
                            <a href="{{ route('detail', $data->slug) }}" class="nav-link position-relative"
                               data-bs-toggle="tooltip" title="{{ $data->ten }}">
                                <img src="{{$data->anh}}" alt="" class="img-fluid">
                                @if($data->gia >= 1)
                                    <span class="badge bg-danger rounded-pill position-absolute top-0 end-0">
                                     <i class="fa-solid fa-crown"></i> Có phí
                                    </span>
                                    @elseif($data->is_vip == true)
                                    <span class="badge bg-warning rounded-pill position-absolute top-0 end-0">
                                     <i class="fa-solid fa-crown"></i> Vip
                                    </span>
                                @endif
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col mb-1">
                <div id="phimbo" class="d-flex justify-content-between " style="padding-top: 72px">
                    <h2>Phim bộ</h2>
                    <a href="{{route('lists',2)}}" class="nav-link"><h4>Xem thêm</h4></a>
                </div>
                <div class="row">
                    @foreach($dataPhimBo as $data)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 movie-card mb-3 mt-3">
                            <a href="{{ route('detail', $data->slug) }}" class="nav-link position-relative"
                               data-bs-toggle="tooltip" title="{{ $data->ten }}">
                                <img src="{{$data->anh}}" alt="" class="img-fluid">
                                @if($data->gia >= 1)
                                    <span class="badge bg-danger rounded-pill position-absolute top-0 end-0">
                                     <i class="fa-solid fa-crown"></i> Có phí
                                    </span>
                                @elseif($data->is_vip == true)
                                    <span class="badge bg-warning rounded-pill position-absolute top-0 end-0">
                                     <i class="fa-solid fa-crown"></i> Vip
                                    </span>
                                @endif
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col mb-1">
                <div id="tv" class="d-flex justify-content-between" style="padding-top: 72px">
                    <h2>TV Shows</h2>
                    <a href="{{route('lists',3)}}" class="nav-link"><h4>Xem thêm</h4></a>
                </div>
                <div class="row">
                    @foreach($dataTvShows as $data)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 movie-card mb-3 mt-3">
                            <a href="{{ route('detail', $data->slug) }}" class="nav-link position-relative"
                               data-bs-toggle="tooltip" title="{{ $data->ten }}">
                                <img src="{{$data->anh}}" alt="" class="img-fluid">
                                @if($data->gia >= 1)
                                    <span class="badge bg-danger rounded-pill position-absolute top-0 end-0">
                                     <i class="fa-solid fa-crown"></i> Có phí
                                    </span>
                                @elseif($data->is_vip == true)
                                    <span class="badge bg-warning rounded-pill position-absolute top-0 end-0">
                                     <i class="fa-solid fa-crown"></i> Vip
                                    </span>
                                @endif
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
