@extends('blogs.blogs')
@section('title')
    {{$model->tieu_de}}
@endsection
@section('content-post')
    <h1 class="text-warning" id="demThoiGian"></h1>
    <h1 class="text-danger">{{$model->tieu_de}}</h1>
    <div class="d-flex mt-3 mb-2  justify-content-between">
        <div>
          <h4>Người đăng: {{$model->user->name}}</h4>
        </div>
        <div>
            <h4>Đăng ngày: {{$model->created_at}}</h4>
        </div>
    </div>
    <div class="mb-4">
        <h4>Lượt xem: @{{ luotxem }}</h4>
    </div>
    @php
        $text = htmlspecialchars($model->noi_dung);
        $text = html_entity_decode($text);
        echo $text;
        @endphp
    <div class="box">
        <h3>Danh mục bài viết</h3>
        <div class="categories">
                <a href="{{route('danhMucBaiViet',[$cate['id'],$cate['slug']])}}">{{$cate['ten']}}</a>
        </div>
    </div>
    <div class="box">
        <h3>Tags bài viết</h3>
        <div class="tags">
            @foreach($tags as $item)
{{--                {{dd($item['ten'])}}--}}
                <a href="{{route('tagBaiViet',[$item['id'],$item['slug']])}}">{{$item['ten']}}</a> @endforeach
        </div>
    </div>

    @section('js')
        <script>
            var viewFunction = function ($scope, $http) {
                var setThoiGian = 10;
                $scope.themLuotXem = () =>{
                   $http.post('{{route('themLuotXem')}}',{
                       id : {{$model['id']}}
                   }).then(function (res){
                       $scope.loadLuotXem()
                   }).catch(function (error){
                       console.log(error)
                   })
                }
                $scope.luotxem = 0;
                $scope.loadLuotXem = ()=>{
                    $http.get('http://movie.test/api/luot-xem-bai-viet/{{$model['id']}}')
                        .then(function (res){
                            $scope.luotxem = res.data.data
                            console.log($scope.luotxem)
                        }).catch(function (error){
                        console.log(error)
                    })
                }
                $scope.loadLuotXem()
                setInterval($scope.loadLuotXem,5000)
                var demNguoc = setInterval(function() {
                    setThoiGian--;
                    if (setThoiGian <= 0) {
                        clearInterval(demNguoc);
                        $scope.themLuotXem()
                    }
                }, 1000);
            }
        </script>
    @endsection
@endsection

