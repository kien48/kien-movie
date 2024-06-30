@extends('layouts.master')
@section('title')
    Cập nhật tài khoản
@endsection
@section('content')
    <div class="container" style="margin-top: 100px;">
        <div class="card mt-4">
            <div class="card-header">
                Cập nhật tài khoản
            </div>
            <div class="card-body">
                <form action="{{ route('updatetk') }}" method="POST" >
                    @csrf
                    @if($errors->any())
                        @foreach($errors->all() as $e)
                            <li>{{$e}}</li>
                        @endforeach
                        @endif
                    @if(session('success'))
                        <li>{{session('success')}}</li>
                    @endif
                    <div class="form-group">
                        <label for="amount">Tên bạn:</label>
                        <input type="text" name="ten" class="form-control" ng-model="ten" ng-change="check()" placeholder="Điền tên của bạn">
                        <span ng-show="thongBaoTen == false" class="text-danger h5">Không để trống!</span>
                    </div>
                    <div class="form-group">
                        <label for="amount">Email:</label>
                        <input type="Email" name="email" class="form-control"  ng-model="email" ng-change="check()" placeholder="Điền email của bạn">
                        <span ng-show="thongBaoEmail == false" class="text-danger h5">Không để trống!</span>
                    </div>
                    <button type="submit" name="redirect" class="btn btn-danger mt-3 btn-block" ng-disabled="disableButton">Gửi</button>
                </form>
            </div>
        </div>
    </div>

    @section('js')
        <script>
            viewFunction = ($scope,$http)=>     {
                $scope.ten = '{{Auth::user()->name}}';
                $scope.email = '{{Auth::user()->email}}';
                $scope.disableButton = true;
                $scope.thongBaoTen = true;
                $scope.thongBaoEmail = true;
                $scope.check = function() {
                    $scope.disableButton = ($scope.ten == "" || $scope.email == "");
                    $scope.thongBaoTen = ($scope.ten != "");
                    $scope.thongBaoEmail = ($scope.email != "");
                };
            }
        </script>
    @endsection
@endsection
