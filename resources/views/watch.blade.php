@extends('layouts.master')
@section('title')
    Xem phim
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('/')}}/themes/web phim/public/comment.css">
@endsection
@section('content')
    <div class="container movie-section" style="margin-top: 100px;">
        <div class="row mt-4">

            <div class="col-8">
                <iframe id="iframe" src="{{$episode['link']}}" frameborder="0" allowfullscreen loading="lazy"
                        width="100%" height="500"></iframe>
            </div>
            <div class="col-4">
                <h5 class="h4 mb-3"
                    style="font-weight: 700;font-size: 35px;@if($model['gia'] >= 1) color:red @elseif($model['is_vip'] == true) color:#fffa06 @else color:white @endif">{{$model['ten']}} </h5>
                <h5 class="font-monospace text-light-emphasis mt-3">{{$model['chat_luong']}}
                    ● {{$model['ngon_ngu']}} </h5>
                <h5 class="font-monospace text-light-emphasis mt-3">Số tập: {{$model['so_tap']}} | Hiện
                    tại: {{$model['trang_thai']}} </h5>
                <h5 class="font-monospace text-light-emphasis mt-3">Năm phát hành: {{$model['nam_phat_hanh']}}</h5>
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
                    title="{{$model['mo_ta']}}!">{{substr($model['mo_ta'],0,100)}}... </h5>
                <div class="d-flex mt-3">
                    <h5 class="font-monospace text-light-emphasis">Diễn viên:</h5>
                    <h5> {{$model['dien_vien']}} </h5>
                </div>
                <div class="d-flex mt-3">
                    <h5 class="font-monospace text-light-emphasis">Đạo diễn:</h5>
                    <h5> {{$model['dao_dien']}} </h5>
                </div>
                <div class="d-flex mt-3">
                    <button class="btn btn-danger" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
                        Báo lỗi
                    </button>
                </div>
            </div>
        </div>

        <!-- Tập và Lượt xem -->
        <div class="row mt-3">
            <div class="col-6">
                <div class="d-flex">
                    <h5 class="h4 font-monospace text-light-emphasis">Tập: </h5>
                    <h5 class="h4 ms-2">@{{ tapPhim }}</h5>
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex">
                    <h5 class="h4 font-monospace text-light-emphasis">Lượt xem: </h5>
                    <h5 class="h4 ms-2">@{{ luotXem }}</h5>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <h3>Danh sách tập phim: </h3>
            <div class="col-8">
                @foreach($model['episode'] as $data)
                    <a href="{{ route('watch', ['slug' => $model['slug'], 'tap' => $data['tap']]) }}" class="btn @if($data['tap'] == $episode['tap'])
    btn-danger
@else
    btn-outline-danger
@endif
" style="width: 45px;height: 40px">{{$data['tap']}}</a>
                @endforeach
            </div>
        </div>

        <div class="container">
            <div class="row mt-5">
                <h3>Bình luận:</h3>
                <div class="col-4 form-container">
                    <form action="" method="post">
                        <div class="d-flex flex-column">
                            <textarea name="content" id="comment" class="form-control1"
                                      placeholder="Nhập bình luận..." ng-model="content"></textarea>
                            <div class="rating-container mt-2">
                                <label for="rating">Đánh giá sao:</label>
                                <select name="rating" id="rating" class="form-control" ng-model="sao">
                                    <option value="" selected>Đánh giá sao</option>
                                    <option value="1">1 sao</option>
                                    <option value="2">2 sao</option>
                                    <option value="3">3 sao</option>
                                    <option value="4">4 sao</option>
                                    <option value="5">5 sao</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-outline-danger mt-2" ng-click="send()">Gửi</button>
                        </div>
                    </form>
                </div>
                <div class="col-8">
                    <div class="comment-container text-black" ng-repeat="data in listComments">
                        <div class="d-flex justify-content-between">
                            <div class="comment-author">@{{ data.user.name }}</div>
                            <div>
                                <h5>@{{ data.created_at | date:'yyyy-MM-dd HH:mm' }}</h5>
                            </div>
                        </div>
                        <div class="comment-text">@{{ data.content }}</div>
                        <div class="comment-rating">
                            Đánh giá sao: @{{ data.sao }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="offcanvas offcanvas-end" id="demo">
        <div class="offcanvas-header">
            <h1 class="offcanvas-title">Báo lỗi phim "{{$model['ten']}}"</h1>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <input type="text" class="form-control" placeholder="Điền trường hợp phim bị lỗi để chúng tôi xử lý">
            <button class="btn btn-secondary" type="button">Gửi</button>
        </div>
    </div>
    @section('js')
        <script>
            viewFunction = function ($scope, $http, $sce, $interval) {
                $scope.listComments = [];
                $scope.content = ''
                $scope.getComment = () => {
                    $http.get('http://movie.test/api/comment/movie/{{ $model['id'] }}')
                        .then(function (response) {
                            $scope.listComments = response.data.data;
                        })
                        .catch(function (error) {
                            console.error(error);
                        });
                }
                $scope.getComment()
                setInterval($scope.getComment, 1000)
                $scope.send = () => {
                    $http.post('http://movie.test/api/comment',
                        {
                            content: $scope.content,
                            sao: $scope.sao,
                            movie_id: {{ $model['id'] }}
                        }
                    )
                        .then(function (res) {
                            $scope.content = ''
                            $scope.getComment()
                        })
                }

                $scope.tapPhim = '';
                $scope.luotXem = '';

                $scope.getLuotXem = () => {
                    $http.get('http://movie.test/api/luot-xem-tap-phim/{{$model['id']}}/{{$episode['tap']}}')
                        .then(function (res) {
                            $scope.tapPhim = res.data.tap;
                            $scope.luotXem = res.data.luot_xem;
                        }).catch(function (error) {
                        console.log(error)
                    })
                }
                $scope.getLuotXem();
                setInterval($scope.getLuotXem, 10000)
                $scope.themLuotXem = ()=>{
                    $http.post('{{route('themLuotXemPhim')}}',{
                        movie_id : {{$model['id']}},
                        tap : {{$episode['tap']}}
                    }).then(function (res){
                        $scope.getLuotXem();
                    })
                }
                var minThoiGian = 60;
                var demNguoc = setInterval(function (){
                    minThoiGian--;
                    if(minThoiGian <= 0){
                        clearTimeout(demNguoc);
                        $scope.themLuotXem()
                    }
                },1000)

            };


        </script>
    @endsection
@endsection
