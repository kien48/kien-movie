@extends('admin.layouts.master')
@section('content')
    <div >
        <h1 class="text-center h3">Thêm phim</h1>
        <div >
            <form action="{{route('admin.movies.store')}}" method="post" name="form">
                @csrf
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
                            <input type="text" class="form-control" id="ten" name="ten" value="{{old('ten')}}">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="pwd" class="form-label">Danh sách:</label>
                            <select type="text" class="form-control" name="list_id" >
                                <option value="">Chọn</option>
                                @foreach($dataLists as $item)
                                    <option value="{{$item->id}}">{{$item->ten}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="mb-3 col-6">
                            <label for="pwd" class="form-label">Link ảnh:</label>
                            <input type="text" class="form-control" name="anh" value="{{old('anh')}}">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="pwd" class="form-label">Ngôn ngữ:</label>
                            <input type="text" class="form-control" name="ngon_ngu" value="{{old('ngon_ngu')}}">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="pwd" class="form-label">Giá phim:</label>
                            <input type="text" class="form-control" name="gia" ng-model="gia" value="{{old('gia')}}">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="pwd" class="form-label">Số tập:</label>
                            <input type="number" class="form-control" name="so_tap" value="{{old('so_tap')}}">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="pwd" class="form-label">Chất lượng:</label>
                            <input type="text" class="form-control" name="chat_luong" value="{{old('chat_luong')}}">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="pwd" class="form-label">Đạo diễn:</label>
                            <input type="text" class="form-control" name="dao_dien" value="{{old('dao_dien')}}">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="pwd" class="form-label">Diễn viên:</label>
                            <input type="text" class="form-control" name="dien_vien" value="{{old('dien_vien')}}">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="pwd" class="form-label">Năm phát hành:</label>
                            <input type="text" class="form-control" name="nam_phat_hanh" value="{{old('nam_phat_hanh')}}">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="pwd" class="form-label">Quốc gia:</label>
                            <input type="text" class="form-control" name="quoc_gia" value="{{old('quoc_gia')}}">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="pwd" class="form-label">Mô tả:</label>
                            <textarea class="form-control" name="mo_ta" >{{old('mo_ta')}}"</textarea>
                        </div>
                        <div class="mb-3 col-6">
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="is_vip" value="1" ng-model="isVip" ng-change="updateGia()" checked>
                            <label class="form-check-label" for="mySwitch">Phải vip không?</label>
                        </div>
                    </div>

                </div>
                <div class="card mt-3">
                    <h4>Thể loại</h4>
                    <div class="mb-3">
                        <select type="text" class="form-control" name="catelogue_id[]" multiple>
                            @foreach($dataCatelogues as $item)
                                <option value="{{$item->id}}">{{$item->ten}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card mt-3 mb-3">
                    <div class="d-flex justify-content-between">
                        <h4>Tập</h4>
                        <button type="button" class="btn btn-danger" ng-click="addEpisode()">Thêm tập</button>
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
                        <tr ng-repeat="episode in episodes">
                            <td><input type="number" class="form-control" name="tap_phim[@{{ episode.number }}-@{{ episode.link }}][so]" ng-model="episode.number"></td>
                            <td><input type="text" class="form-control" name="tap_phim[@{{ episode.number }}-@{{ episode.link }}][link]" ng-model="episode.link"></td>
                            <td><button type="button" class="btn btn-danger" ng-click="removeEpisode($index)">Xóa</button></td>
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
                $scope.episodes = [{ number: 1, link: '' }];
                console.log($scope.episodes)
                $scope.addEpisode = function() {
                    $scope.episodes.push({ number: $scope.episodes.length + 1, link: '' });
                };

                $scope.removeEpisode = function(index) {
                    $scope.episodes.splice(index, 1);
                };

                $scope.isVip = false;
                $scope.gia = '';
                $scope.updateGia = function() {
                    if ($scope.isVip) {
                        $scope.gia = 0;
                    } else {
                        $scope.gia = '';
                    }
                };
            }
        </script>
    @endsection

@endsection
