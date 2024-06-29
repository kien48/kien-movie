@extends('layouts.master')
@section('title')
    Nạp xu
@endsection
@section('content')
    <div class="container" style="margin-top: 100px;">
        <div class="card mt-4">
            <div class="card-header">
                Nạp Xu
            </div>
            <div class="card-body">
                <form action="{{ route('vnPay') }}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label for="amount">Số Lượng Xu:</label>
                        <input type="number" name="coin" class="form-control" id="amount" ng-model="coin" ng-change="check()" placeholder="Nhập số lượng xu cần nạp">
                        <span ng-show="thongBao == false" class="text-danger h5">Phải lớn hơn 50000</span>
                    </div>
                    <button type="submit" name="redirect" class="btn btn-danger mt-3 btn-block" ng-disabled="disablePaymentButton">Thanh toán</button>
                </form>
            </div>
        </div>
    </div>

    @section('js')
        <script>
            viewFunction = ($scope,$http)=>     {
                    $scope.coin = '';
                    $scope.disablePaymentButton = true; // Ban đầu làm mờ nút
                    $scope.thongBao = true; // Ẩn thông báo ban đầu

                    $scope.check = function() {
                        if ($scope.coin < 10000) {
                            $scope.thongBao = false;
                            $scope.disablePaymentButton = true;
                        } else {
                            $scope.thongBao = true;
                            $scope.disablePaymentButton = false;
                        }
                    };
                }
        </script>
    @endsection
@endsection
