@extends('layouts.master')
@section('title')
    Chi tiết phim
@endsection
@section('content')
    <div class="container movie-section" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-3 col-12 position-relative">
                <img src="{{$model['anh']}}" alt="" class="img-fluid"
                     style="border-radius: 10px;width: 290px;height: 450px">
                @if($model['gia'] >= 1)
                    <span class="badge bg-danger rounded-pill position-absolute top-0 end-0">
                                     <i class="fa-solid fa-crown"></i>
                        <span ng-show="statusMuaPhim == true">Đã mua</span>
                        <span ng-show="statusMuaPhim == false">Có phí</span>
                                    </span>
                @elseif($model['is_vip'] == true)
                    <span class="badge bg-warning rounded-pill position-absolute top-0 end-0">
                                     <i class="fa-solid fa-crown"></i> Vip
                                    </span>
                @endif
            </div>
            <div class="col-md-9 col-12">
                <h3 class="mb-3"
                    style="font-weight: 700;font-size: 50px;@if($model['gia'] >= 1) color:red @elseif($model['is_vip'] == true) color:#fffa06 @else color:white @endif">{{$model['ten']}} </h3>
                <div class="d-flex mt-3">
                    <h5 class="font-monospace text-light-emphasis ">{{$model['chat_luong']}}
                        ● {{$model['ngon_ngu']}} ●</h5>
                    <div class="d-flex text-warning ms-2">
                        @for ($i = 1; $i <= $avgSao; $i++)
                            <i class="fa-solid fa-star"></i>
                        @endfor
                        @for ($i = $avgSao + 1; $i <= 5; $i++)
                            <i class="fa-regular fa-star"></i>
                        @endfor
                        ({{$soBinhLuan}} lượt đánh giá)
                    </div>
                </div>
                <h5 class="font-monospace text-light-emphasis mt-3">Số tập: {{$model['so_tap']}} | Hiện
                    tại: {{$model['trang_thai']}} </h5>
                <h5 class="font-monospace text-light-emphasis mt-3">Năm phát hành: {{$model['nam_phat_hanh']}}
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
                        title="{{$model['mo_ta']}}!">{{substr($model['mo_ta'],0,200)}}... </h5>
                        <div class="d-flex mt-3">
                            <h5 class="font-monospace text-light-emphasis">Diễn viên:</h5>
                            <h5> {{$model['dien_vien']}} </h5>
                        </div>
                        <div class="d-flex mt-3">
                            <h5 class="font-monospace text-light-emphasis">Đạo diễn:</h5>
                            <h5> {{$model['dao_dien']}} </h5>
                        </div>
                        <div class="d-flex">
                            @if($model['is_vip'] == 0)
                                <div class="d-flex mt-3">
                                    <h5 class="font-monospace text-light-emphasis">Giá phim:</h5>
                                    <h5> {{number_format($model['gia'])}} xu </h5>
                                </div>
                            @endif
                            <div class="d-flex mt-3 @if($model['is_vip'] == 0) ms-3 @endif">
                                <h5 class="font-monospace text-light-emphasis">Lượt thích:</h5>
                                <h5> @{{ countLike }} </h5>
                            </div>
                                <div class="d-flex mt-3 ms-3 ">
                                    <h5 class="font-monospace text-light-emphasis">Tổng lượt xem:</h5>
                                    <h5> {{$tongLuotXem}} </h5>
                                </div>
                        </div>
                        <div class="d-flex mt-2">
                            @if($is_vip == 0 && $model['is_vip'] == true)
                                <div class="mt-3">
                                    <button class="btn btn-outline-warning"
                                            style="height: 80px; width: 170px; display: flex; align-items: center; justify-content: center;"
                                            disabled>
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
                                        <div class="mt-3" ng-show="statusMuaPhim == false">
                                            <button data-bs-toggle="modal" data-bs-target="#myModalMuaPhim"
                                                    class="btn btn-outline-warning wobble-hor-bottom"
                                                    style="height: 80px; width: 170px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                                                <h2 style="margin: 0; display: flex; align-items: center;color: white;">
                                                    <i class="fa-solid fa-bag-shopping"
                                                       style="margin-right: 10px;"></i>
                                                </h2>
                                            </button>
                                        </div>
                                        <div class="mt-3" ng-show="statusMuaPhim == true">
                                            <a href="{{ route('watch', ['slug' => $model['slug'], 'tap' => $model['episode'][0]['tap']]) }}"
                                               class="btn btn-light"
                                               style="height: 80px; width: 170px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                                                <h2 style="margin: 0; display: flex; align-items: center;color: black;">
                                                    <i class="fa-solid fa-play" style="margin-right: 10px;"></i>
                                                </h2>
                                            </a>
                                        </div>
                                    @endif
                                @else
                                    <div class="mt-3">
                                        <button class="btn btn-outline-info"
                                                style="height: 80px; width: 170px; display: flex; align-items: center; justify-content: center;"
                                                disabled>
                                            <h4 style="margin: 0; display: flex; align-items: center;color: white;">
                                                Phim sắp chiếu
                                            </h4>
                                        </button>
                                    </div>
                                @endif
                            @endif

                            <div class="mt-3 ms-3" ng-show="ketqua === false">
                                <form action="" method="post">
                                    <button ng-click="add()" type="button" class="btn btn-outline-danger @{{ out }}"
                                            style="height: 80px; width: 170px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                                        <h2 style="margin: 0; display: flex; align-items: center;color: white;">
                                            <i class="fa-solid fa-heart"></i>
                                        </h2>
                                    </button>
                                </form>
                            </div>
                            <div class="mt-3 ms-3" ng-show="ketqua === true">
                                <form action="" method="post">
                                    <button ng-click="remove()" type="button" class="btn btn-danger @{{ in }}"
                                            style="height: 80px; width: 170px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                                        <h2 style="margin: 0; display: flex; align-items: center;color: white;">
                                            <i class="fa-solid fa-heart"></i>
                                        </h2>
                                    </button>
                                </form>
                            </div>

                            @if(Auth::check())
                                <div class="mt-3 ms-3">
                                    <form action="" method="post">
                                        <button ng-show="like == true" ng-click="unLike()" type="button"
                                                class="btn btn-info jello-vertical"
                                                style="height: 80px; width: 170px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                                            <h2 style="margin: 0; display: flex; align-items: center;color: white;">
                                                <i class="fa-solid fa-thumbs-up"></i>
                                            </h2>
                                        </button>
                                    </form>
                                </div>
                                <div class="mt-3 ">
                                    <form action="" method="post">
                                        <button ng-show="like == false" ng-click="likes()" type="button"
                                                class="btn btn-outline-info"
                                                style="height: 80px; width: 170px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                                            <h2 style="margin: 0; display: flex; align-items: center;color: white;">
                                                <i class="fa-regular fa-thumbs-up"></i>
                                            </h2>
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
            </div>
        </div>
        <div class="row mb-5 mt-5">
            <div class="col mb-1">
                <div id="" class="d-flex justify-content-between">
                    <h2>Bạn có thể sẽ thích</h2>
                </div>
                <div class="row">
                    @foreach($phimLienQuan as $data)
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
    {{--Modal mua phim--}}
    <!-- The Modal -->
    <div class="modal text-danger fade" id="myModalMuaPhim" tabindex="-1" aria-labelledby="myModalMuaPhimLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h3 class="modal-title text-white" id="myModalMuaPhimLabel">Mua phim</h3>
                    <button type="button" id="close" class="btn-close btn-close-white btn-dong-phim" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if(isset($dataUser['coin'][0]['coin']) && $dataUser['coin'][0]['coin'] >= $model['gia'])
                        <form action="" method="post">
                            @csrf
                            <h5 class="mb-3">Số xu còn
                                lại: {{ isset($dataUser['coin'][0]['coin']) ? number_format($dataUser['coin'][0]['coin']) : 0 }}
                                xu</h5>
                            <h5 class="mb-3">Giá phim: {{ number_format($model['gia']) }} xu</h5>
                            <hr>
                            <h5 class="mb-3">Tổng xu còn
                                lại: {{ isset($dataUser['coin'][0]['coin']) ? number_format($dataUser['coin'][0]['coin'] - $model['gia']) : 0 }}
                                xu</h5>
                        <h5>*20% xu sẽ được trích vào quỹ</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" ng-click="muaPhim()" class="btn btn-primary">Xác nhận mua phim</button>
                    </form>
                    @else
                        <h3>Không đủ tiền để mua phim này</h3>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <audio id="likeSound" src="{{asset('/')}}/themes/web phim/public/img/click.mp3" preload="auto"></audio>
    <audio id="loveSound" src="{{asset('/')}}/themes/web phim/public/img/love.mp3" preload="auto"></audio>
    <audio id="coinSound" src="{{asset('/')}}/themes/web phim/public/img/coin.mp3" preload="auto"></audio>

    @section('js')
        <script>
            viewFunction = ($scope, $http) => {
                $scope.out = ''
                $scope.in = ''
                // Thêm phim vào danh sách yêu thích
                $scope.add = function () {
                    $http.post('{{ route("add") }}', {
                        movie_id: '{{ $model["id"] }}'
                    }).then(response => {
                        $scope.out = 'scale-out-center'
                        $scope.in = ''
                        playLoveSound()
                        $scope.kiemTra();
                    }).catch(error => {
                        console.error('Error');
                    });
                };

                // Xóa phim khỏi danh sách yêu thích
                $scope.remove = function () {
                    $http.post('{{ route("remove") }}', {
                        id: '{{ $model["id"] }}'
                    }).then(response => {
                        $scope.out = ''
                        $scope.in = 'scale-out-center'
                        $scope.kiemTra();
                    }).catch(error => {
                        console.error('Error');
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

                $scope.likes = () => {
                    $http.post('{{route('likeMovie')}}', {
                        movie_id: '{{$model['id']}}'
                    }).then(function (res) {
                        $scope.checkLike();
                        $scope.countLikeMovie();
                        playLikeSound()
                    }).catch(error => {
                        console.error(error);
                    })
                }

                $scope.unLike = () => {
                    $http.post('{{route('unLikeMovie')}}', {
                        movie_id: '{{ $model["id"] }}',
                    }).then(function (res) {
                        $scope.checkLike();
                        $scope.countLikeMovie();
                    }).catch(error => {
                        console.error(error);
                    })
                }
                $scope.like = false;
                $scope.checkLike = () => {
                    $http.get('http://movie.test/api/like/{{$model['id']}}')
                        .then(function (res) {
                            $scope.like = res.data.status
                        })
                }
                $scope.checkLike();

                $scope.countLikeMovie = () => {
                    $http.get('http://movie.test/api/count-like/{{$model['id']}}')
                        .then(function (res) {
                            $scope.countLike = res.data.data;
                        }).catch(error => {
                        console.error(error);
                    });
                };

                $scope.countLikeMovie();
                setInterval($scope.countLikeMovie, 1000);


                $scope.muaPhim = () => {
                    $http.post('{{ route('muaPhim') }}', {
                        movie_id: {{$model['id']}},
                        coin: {{$model['gia']}}
                    }).then(function (res) {
                        $scope.ttMuaPhim();
                        document.querySelector('.btn-dong-phim').click()
                        playCoinSound()
                    })
                }
                $scope.statusMuaPhim = false;
                $scope.ttMuaPhim = () => {
                    $http.get('http://movie.test/api/mua-phim-status/{{$model['slug']}}')
                        .then(function (res) {
                            $scope.statusMuaPhim = res.data.status
                        }).catch(function (error) {
                        console.log(error)
                    })
                }
                $scope.ttMuaPhim();
                function playLikeSound() {
                    likeSound.currentTime = 0;
                    likeSound.play();
                }
                function playLoveSound() {
                    loveSound.currentTime =0;
                    loveSound.play()
                }
                function playCoinSound() {
                    coinSound.currentTime =0;
                    coinSound.play()
                }
            };
        </script>
    @endsection
@endsection
