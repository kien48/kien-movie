@extends('admin.layouts.master')
@section('title')
    Trang thông báo lỗi phim
@endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12 bg-light py-3">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0 text-dark">
                        <li class="breadcrumb-item"><a href="#" class="nav-link">@yield('title')</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="container">
        <h1>Danh Sách Thông Báo Lỗi Phim Chưa Fix</h1>
        <div  ng-show="danhSach.length == 0">
            Chưa có thông báo nào
        </div>
        <table class="table" ng-show="danhSach.length > 0">
            <thead>
            <tr>
                <th>ID</th>
                <th>Movie ID</th>
                <th>Tên phim</th>
                <th>User ID</th>
                <th>Tên người dùng</th>
                <th>Tập</th>
                <th>Nội Dung</th>
                <th>Trạng Thái</th>
                <th>Ngày Tạo</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="loi in danhSach">
                <td>@{{ loi.id }}</td>
                <td>@{{ loi.movie_id }}</td>
                <td>@{{ loi.movie.ten }}</td>
                <td>@{{ loi.user_id }}</td>
                <td>@{{ loi.user.name }}</td>
                <td>@{{ loi.tap }}</td>
                <td>@{{ loi.noi_dung }}</td>
                <td>@{{ loi.trang_thai }}</td>
                <td>@{{ loi.created_at | date:'HH:mm dd/MM/yyyy' }}</td>
                <td>
                    <button type="button" class="btn btn-primary" ng-click="openModal(loi)" data-bs-toggle="modal"
                            data-bs-target="#myModal">
                        Cập nhật
                    </button>
                </td>
            </tr>
            </tbody>
        </table>

        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-danger text-white">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Sửa trạng thái thông báo lỗi phim id : @{{ selectedLoi.id }}</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <label>Sửa trạng thái</label>
                        <select class="form-select" ng-model="selectedLoi.trang_thai">
                            <option value="Đã fix">Đã fix</option>
                            <option value="Spam">Spam</option>
                        </select>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" ng-click="capNhat()">Gửi</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @section('js')
        <script>
            viewFunction = ($scope, $http) => {
                $scope.danhSach = [];
                $scope.selectedLoi = {};

                $scope.getDanhSach = () => {
                    $http.get('http://movie.test/api/danh-sach-thong-bao-loi')
                        .then(function (res) {
                            $scope.danhSach = res.data.data;
                        });
                };

                $scope.openModal = (loi) => {
                    $scope.selectedLoi = angular.copy(loi);
                };

                $scope.getDanhSach();
                $scope.capNhat = () => {
                    $http.post('{{route('admin.fix-loi')}}',{
                        id : $scope.selectedLoi.id,
                        trang_thai : $scope.selectedLoi.trang_thai
                    }).then(function (res){
                        alert('cập nhật thành công')
                        $scope.getDanhSach();
                        document.querySelector('.btn-close').click()
                    })
                }
            };
        </script>
    @endsection
@endsection
