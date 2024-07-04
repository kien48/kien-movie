@extends('admin.layouts.master')
@section('title')
    Danh sách thông báo đã gửi
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Gửi thông báo </h1>
            <form action="" method="post">
                <div class="form-group">
                    <label for="message">Tới:</label>
                    <select class="form-select" name="chon" ng-model="chon">
                        <option value="" selected>Chọn</option>
                        <option value="all">Tất cả</option>
                        <option value="vip">Vip</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message">Thông báo:</label>
                    <textarea class="form-control" ng-model="noi_dung" id="message" name="message" rows="5"></textarea>
                </div>
                <button type="button" ng-click="guiThongBaoAdmin()" class="btn btn-primary">Gửi</button>
            </form>
        </div>
    </div>

    @section('js')
        <script>
            viewFunction = ($http, $scope)=> {
                $scope.guiThongBaoAdmin = () => {
                    $http.post('{{ route('admin.thong-bao-admin.store') }}', {
                        chon : $scope.chon,
                        noi_dung: $scope.noi_dung
                    }).then(response => {
                        $scope.noi_dung = ""
                        alert('Gửi thành công')
                        console.log(response.data);
                    }).catch(error => {
                        console.error('Error');
                    });
                }

            }
        </script>
    @endsection
@endsection
