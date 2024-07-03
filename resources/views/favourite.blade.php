@extends('layouts.master')
@section('title')
    Danh sách yêu thích
@endsection
@section('content')
    <div class="container movie-section" style="margin-top: 100px;">

    <div class="row mb-5">
        <div class="col mb-1">
            <div id="" class="d-flex justify-content-between">
                <h2>Phim yêu thích</h2>
            </div>
            <div class="row">
                @foreach(session('favourite') as $data)
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
@endsection
