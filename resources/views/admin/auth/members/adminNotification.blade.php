@extends('admin.layouts.master')

@section('title')
    Gửi thông báo tới tài khoản
@endsection

@section('css')
   <style>
       .notification-box {
           border: 1px solid #ccc;
           padding: 20px;
           margin-top: 20px;
           border-radius: 5px;
           background-color: #f9f9f9;
       }
       .notification-box h2 {
           margin-top: 0;
       }
   </style>
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12 bg-light py-3">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0 text-dark">
                        <li class="breadcrumb-item"><a href="{{route('admin.members.index')}}" class="nav-link">Danh sách tài khoản người dùng</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Gửi thông báo tới tài khoản {{$user->name}}</h1>
                <form action="">
                    <div class="form-group">
                        <label for="message">Thông báo:</label>
                        <textarea class="form-control" ng-model="noi_dung" id="message" name="message" rows="5"></textarea>
                    </div>
                    <button type="button" ng-click="guiThongBaoAdmin()" class="btn btn-primary">Gửi</button>
                </form>
            </div>
        </div>
        <div class="row">
            <h2>Thông báo đã gửi</h2>
            <div class="col-md-12" ng-repeat="thongBao in danhSachThongBao">
                <div class="notification-box" ng-class="{'bg-success': thongBao.trang_thai === 'Đã đọc', 'bg-danger': thongBao.trang_thai == 'Chưa đọc'}">
                    <p><strong>Người nhận: </strong>{{$user->name}}</p>
                    <p><strong>Nội dung: </strong> @{{ thongBao.noi_dung }}</p>
                    <p><strong>Trạng thái: </strong> @{{ thongBao.trang_thai }}</p>
                    <p><strong>Thời gian gửi:</strong> @{{ thongBao.created_at }}</p>
                </div>
            </div>
        </div>
    </div>

    @section('js')
        <script>
            viewFunction = ($http, $scope)=>{
                $scope.guiThongBaoAdmin = ()=>{
                    $http.post('{{ route('admin.guiThongBao') }}', {
                        user_id : {{$user->id}},
                        noi_dung: $scope.noi_dung
                    }).then(response => {
                        $scope.noi_dung =""
                        alert('Gửi thành công')
                        console.log(response.data);
                        $scope.getDanhSach()
                    }).catch(error => {
                        console.error('Error');
                    });
                }

                $scope.danhSachThongBao = []
                $scope.getDanhSach = ()=>{
                    $http.get('http://movie.test/api/danh-sach-thong-bao-admin/{{$user->id}}')
                        .then(function (res){
                        $scope.danhSachThongBao = res.data.data
                        console.log($scope.danhSachThongBao)
                    }).catch(error => {
                        console.error('Error');
                    });
                }
                $scope.getDanhSach()
            }
        </script>
    @endsection
@endsection
