@extends('layouts.master')
@section('title')
    Chi tiết phim
@endsection
@section('content')
    <div class="container movie-section" style="margin-top: 100px;">
        <div class="row">
            <div class="col-3 position-relative">
                <img src="{{$model['anh']}}" alt="" class="img-fluid"
                     style="border-radius: 10px;width: 290px;height: 450px">
                @if($model['gia'] >= 1)
                    <span class="badge bg-danger rounded-pill position-absolute top-0 end-0">
                                     <i class="fa-solid fa-crown"></i> @if($trangThaiMuaPhim == true) Đã mua @else Có phí @endif
                                    </span>
                @elseif($model['is_vip'] == true)
                    <span class="badge bg-warning rounded-pill position-absolute top-0 end-0">
                                     <i class="fa-solid fa-crown"></i> Vip
                                    </span>
                @endif
            </div>
            <div class="col-9">
                <h3 class="mb-3"
                    style="font-weight: 700;font-size: 50px;@if($model['gia'] >= 1) color:red @elseif($model['is_vip'] == true) color:#fffa06 @else color:white @endif">{{$model['ten']}} </h3>
                <h5 class="font-monospace text-light-emphasis mt-3">{{$model['chat_luong']}}
                    ● {{$model['ngon_ngu']}} </h5>
                <h5 class="font-monospace text-light-emphasis mt-3">Số tập: {{$model['so_tap']}} | Hiện
                    tại: {{$model['trang_thai']}} </h5>
                <h5 class="font-monospace text-light-emphasis mt-3">Thể loại:
                    @if(count($model['catelogue']) >=1)
                        @foreach($model['catelogue'] as $data)
                           | {{$data['ten']}} |
                        @endforeach
                    @else
                        Đang cập nhật
                    @endif
                </h5>
                <h5 class="h4 mt-3" data-bs-toggle="tooltip"
                    title="{{$model['mo_ta']}}!">{{substr($model['mo_ta'],0,500)}}... </h4>
                    <div class="d-flex mt-3">
                        <h5 class="font-monospace text-light-emphasis">Diễn viên:</h5>
                        <h5> {{$model['dien_vien']}} </h5>
                    </div>
                    <div class="d-flex mt-3">
                        <h5 class="font-monospace text-light-emphasis">Đạo diễn:</h5>
                        <h5> {{$model['dao_dien']}} </h5>
                    </div>
                   @if($model['is_vip'] == 0)
                        <div class="d-flex mt-3">
                            <h5 class="font-monospace text-light-emphasis">Giá phim:</h5>
                            <h5> {{number_format($model['gia'])}} xu </h5>
                        </div>
                    @endif
                    <div class="d-flex ">
                        @if($is_vip == 0 && $model['is_vip'] == true)
                            <div class="mt-3">
                                <button class="btn btn-outline-warning" style="height: 80px; width: 170px; display: flex; align-items: center; justify-content: center;" disabled>
                                    <h4 style="margin: 0; display: flex; align-items: center;color: white;">
                                        Chỉ dành cho tài khoản VIP
                                    </h4>
                                </button>
                            </div>
                        @else
                            @if(isset($model['episode'][0]))
                                @if($model['gia'] == 0)
                                    <div class="mt-3">
                                        <a href="{{ route('watch', ['slug' => $model['slug'], 'tap' => $model['episode'][0]['tap']]) }}"
                                           class="btn btn-light"
                                           style="height: 80px; width: 170px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                                            <h2 style="margin: 0; display: flex; align-items: center;color: black;">
                                                <i class="fa-solid fa-play" style="margin-right: 10px;"></i>
                                            </h2>
                                        </a>
                                    </div>
                                @else
                                    @if($trangThaiMuaPhim == false)
                                        <div class="mt-3">
                                            <button data-bs-toggle="modal" data-bs-target="#myModalMuaPhim"
                                                    class="btn btn-outline-warning"
                                                    style="height: 80px; width: 170px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                                                <h2 style="margin: 0; display: flex; align-items: center;color: white;">
                                                    <i class="fa-solid fa-bag-shopping" style="margin-right: 10px;"></i>
                                                </h2>
                                            </button>
                                        </div>
                                    @else
                                        <div class="mt-3">
                                            <a href="{{ route('watch', ['slug' => $model['slug'], 'tap' => $model['episode'][0]['tap']]) }}"
                                               class="btn btn-light"
                                               style="height: 80px; width: 170px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                                                <h2 style="margin: 0; display: flex; align-items: center;color: black;">
                                                    <i class="fa-solid fa-play" style="margin-right: 10px;"></i>
                                                </h2>
                                            </a>
                                        </div>
                                    @endif
                                @endif
                            @else
                                <div class="mt-3">
                                    <a href="#" class="btn btn-warning"
                                       style="height: 80px; width: 170px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                                        <h2 style="margin: 0; display: flex; align-items: center;color: white;">
                                            <i class="fa-solid fa-screwdriver-wrench"></i>
                                        </h2>
                                    </a>
                                </div>
                            @endif
                        @endif

                        <div class="mt-3 ms-3" ng-show="ketqua === false">
                            <form action="" method="post">
                                <button ng-click="add()" type="button" class="btn btn-outline-danger"
                                        style="height: 80px; width: 170px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                                    <h2 style="margin: 0; display: flex; align-items: center;color: white;">
                                        <i class="fa-solid fa-heart"></i>
                                    </h2>
                                </button>
                            </form>
                        </div>
                        <div class="mt-3 ms-3" ng-show="ketqua === true">
                            <form action="" method="post">
                                <button ng-click="remove()" type="button" class="btn btn-danger"
                                        style="height: 80px; width: 170px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                                    <h2 style="margin: 0; display: flex; align-items: center;color: white;">
                                        <i class="fa-solid fa-heart"></i>
                                    </h2>
                                </button>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
        <div class="row mb-5 mt-5">
            <div class="col mb-1">
                <div id="" class="d-flex justify-content-between">
                    <h2>Bạn có thể sẽ thích</h2>
                </div>
                <div class="row">
                    @foreach($phimLienQuan as $item)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 movie-card mb-3 mt-3">
                            <a href="{{ route('detail', $item['slug']) }}" class="nav-link position-relative"
                               data-bs-toggle="tooltip" title="{{ $item['ten'] }}">
                                <img src="{{$item['anh']}}" alt="" class="img-fluid">
                                @if($item['gia'] >= 1)
                                    <span class="badge bg-danger rounded-pill position-absolute top-0 end-0">
                                     <i class="fa-solid fa-crown"></i> Có phí
                                    </span>
                                @elseif($item['is_vip'] == true)
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
    {{--Modal mua phim--}}
    <!-- The Modal -->
    <div class="modal" id="myModalMuaPhim">
        <div class="modal-dialog">
            <div class="modal-content bg-warning">

                <!-- Modal Header -->
                <div class="modal-header ">
                    <h3 class="modal-title">Mua phim</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    @if(isset($dataUser['coin'][0]['coin']) && $dataUser['coin'][0]['coin'] >= $model['gia'])
                        <form action="{{route('muaPhim')}}" method="post">
                            @csrf
                            <h5>Số xu còn lại
                                : {{isset($dataUser['coin'][0]['coin']) ? (number_format($dataUser['coin'][0]['coin'])) : 0}}
                                xu</h5>
                            <h5>Giá phim : {{number_format($model['gia'])}} xu</h5>
                            <hr>
                            <h5>Tổng xu còn lại
                                : {{(isset($dataUser['coin'][0]['coin'])) ? (number_format($dataUser['coin'][0]['coin']  - $model['gia']) ) : 0}}
                                xu</h5>
                            <input name="movie_id" type="hidden" value="{{$model['id']}}">
                            <input name="coin" type="hidden" value="{{$model['gia']}}">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </form>
                    @else
                        <h3>Không đủ tiền đòi mua ?</h3>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    @endif
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    @section('js')
        <script>
            viewFunction = ($scope, $http) => {
                // Thêm phim vào danh sách yêu thích
                $scope.add = function () {
                    $http.post('{{ route("add") }}', {
                        movie_id: '{{ $model["id"] }}'
                    }).then(response => {
                        alert('Thêm vào mục yêu thích thành công');
                        $scope.kiemTra();
                    }).catch(error => {
                        alert('Error');
                    });
                };

                // Xóa phim khỏi danh sách yêu thích
                $scope.remove = function () {
                    $http.post('{{ route("remove") }}', {
                        id: '{{ $model["id"] }}'
                    }).then(response => {
                        alert('Xóa khỏi mục yêu thích thành công');
                        $scope.kiemTra();
                    }).catch(error => {
                        alert('Error');
                    });
                };

                $scope.ketqua = false;

                $scope.kiemTra = () => {
                    $http.get('http://movie.test/api/favourite/{{$model['slug']}}')
                        .then(res => {
                                $scope.ketqua = res.data.status;
                        }).catch(error => {
                        console.error(error);
                    });
                };
                $scope.kiemTra();
            };
        </script>
    @endsection
@endsection
