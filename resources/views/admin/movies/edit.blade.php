@extends('admin.layouts.master')
@section('content')
    <div >
        <h1 class="text-center h3">Cập nhật phim</h1>
        <div >
            <form action="{{route('admin.movies.update',$modelMovie['slug'])}}" method="post" name="form">
                @csrf
                @method('PUT')
                <div class="card">
                    <h4>Thông tin phim</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="mb-3  col-6">
                            <label for="ten" class="form-label">Tên phim:</label>
                            <input type="text" class="form-control" id="ten" name="ten" value="{{$modelMovie['ten']}}">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="pwd" class="form-label">Danh sách:</label>
                            <select type="text" class="form-control" name="list_id">
                                <option value="">Chọn</option>
                                @foreach($dataLists as $item)
                                    <option value="{{$item->id}}" @if($item->id == $modelMovie['list_id']) selected @endif>{{$item->ten}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="mb-3 col-6">
                            <label for="pwd" class="form-label">Link ảnh:</label>
                            <input type="text" class="form-control" name="anh" value="{{$modelMovie['anh']}}" >
                        </div>
                        <div class="mb-3 col-6">
                            <label for="pwd" class="form-label">Ngôn ngữ:</label>
                            <input type="text" class="form-control" name="ngon_ngu" value="{{$modelMovie['ngon_ngu']}}">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="pwd" class="form-label">Giá phim:</label>
                            <input type="text" ng-model="gia" class="form-control" name="gia" value="{{$modelMovie['gia']}}">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="pwd" class="form-label">Số tập:</label>
                            <input type="number" class="form-control" name="so_tap" value="{{$modelMovie['so_tap']}}" >
                        </div>
                        <div class="mb-3 col-6">
                            <label for="pwd" class="form-label">Chất lượng:</label>
                            <input type="text" class="form-control" name="chat_luong" value="{{$modelMovie['chat_luong']}}">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="pwd" class="form-label">Đạo diễn:</label>
                            <input type="text" class="form-control" name="dao_dien" value="{{$modelMovie['dao_dien']}}">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="pwd" class="form-label">Diễn viên:</label>
                            <input type="text" class="form-control" name="dien_vien" value="{{$modelMovie['dien_vien']}}">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="pwd" class="form-label">Năm phát hành:</label>
                            <input type="text" class="form-control" name="nam_phat_hanh" value="{{$modelMovie['nam_phat_hanh']}}">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="pwd" class="form-label">Quốc gia:</label>
                            <input type="text" class="form-control" name="quoc_gia" value="{{$modelMovie['quoc_gia']}}">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="pwd" class="form-label">Mô tả:</label>
                            <textarea class="form-control" name="mo_ta">{{$modelMovie['mo_ta']}}</textarea>
                        </div>
                        <div class="mb-3 col-6">
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="is_vip"  value="1" ng-model="isVip" ng-change="updateGia()" >
                            <label class="form-check-label" for="mySwitch">Phải vip không?</label>
                        </div>
                    </div>

                </div>
                <div class="card mt-3">
                    <h4>Thể loại</h4>
                    <div class="mb-3">
                        <select type="text" class="form-control" name="catelogue_id[]" multiple>
                            @foreach($dataCatelogues as $item)
                                @php
                                    $status = '';
                                    foreach($modelCatelogue as $cate) {
                                        if($item->id == $cate['id']) {
                                            $status = 'selected';
                                            break; // Break out of the loop once a match is found
                                        }
                                    }
                                @endphp
                                <option value="{{ $item->id }}" {{ $status }}>{{ $item->ten }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card mt-3 mb-3">
                    <div class="d-flex justify-content-between">
                        <h4>Tập</h4>
                        <button type="button" class="btn btn-danger" ng-show="{{count($modelEpisode)}} ==0 " ng-click="addEpisode()">Thêm tập</button>
                        <button type="button" class="btn btn-danger" ng-show="{{count($modelEpisode)}} > 0 " ng-click="addTap()">Thêm tập</button>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Tập</th>
                            <th>Link</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-show="{{count($modelEpisode)}} ==0 " ng-repeat="episode in episodes">
                            <td><input type="number" class="form-control" name="tap_phim[@{{ episode.number }}-@{{ episode.link }}][so]" ng-model="episode.number"></td>
                            <td><input type="text" class="form-control" name="tap_phim[@{{ episode.number }}-@{{ episode.link }}][link]" ng-model="episode.link"></td>
                            <td><button type="button" class="btn btn-danger" ng-click="removeEpisode($index)">Xóa</button></td>
                        </tr>
                        <tr ng-repeat="episode in dsTap">
                            <td><input type="number" class="form-control" name="tap_phim[@{{ episode.tap }}-@{{ episode.link }}][so]" ng-model="episode.tap"></td>
                            <td><input type="text" class="form-control" name="tap_phim[@{{ episode.tap }}-@{{ episode.link }}][link]" ng-model="episode.link"></td>
                            <td><button type="button" class="btn btn-danger" ng-click="removeTap($index)">Xóa</button></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-success mb-4 mt-4"  ng-disabled="form.$invalid">Gửi</button>
            </form>

        </div>
    </div>
    @section('js')
        <script>
            viewFunction = ($scope,$http)=>{
                $scope.dsTap = []
                $http.get('http://movie.test/api/episode/{{$modelMovie['slug']}}')
                    .then(function (res){
                        $scope.dsTap = res.data.data
                        console.log($scope.dsTap)
                        }
                    )
                $scope.addTap = function() {
                    $scope.dsTap.push({ tap: $scope.dsTap.length + 1, link: '' });
                };
                $scope.removeTap = function(index) {
                    $scope.dsTap.splice(index, 1);
                };

                $scope.episodes = [{ number: 1, link: '' }];
                console.log($scope.episodes)
                $scope.addEpisode = function() {
                    $scope.episodes.push({ number: $scope.episodes.length + 1, link: '' });
                };

                $scope.removeEpisode = function(index) {
                    $scope.episodes.splice(index, 1);
                };

                $scope.isVip = @if($modelMovie['is_vip'] == 1) true @else false @endif;
                $scope.gia = {{$modelMovie['gia']}};
                $scope.updateGia = function() {
                    if ($scope.isVip) {
                        $scope.gia = 0;
                    } else {
                        $scope.gia = {{$modelMovie['gia']}};
                    }
                };

            }
        </script>
    @endsection

@endsection

