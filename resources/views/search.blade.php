@extends('layouts.master')
@section('title')
    Lọc phim
@endsection
@section('content')
    <div class="container movie-section" style="margin-top: 100px;">
        <div class="row mb-5">
            <div class="col mb-1">
                <div class="d-flex justify-content-between">
                    <h2>Lọc phim</h2>
                </div>
                <form>
                    <div class="row">
                        <div class="col-4 mb-3">
                            <input type="text" class="form-control form-control-lg" ng-model="searchText"
                                   placeholder="Tìm kiếm tên phim" ng-change="filterMovies()">
                        </div>
                        <div class="col-4 mb-3">
                            <select class="form-select form-select-lg" ng-model="selectedCatalogue"
                                    ng-change="filterMovies()">
                                <option value="">Thể loại</option>
                                <option ng-repeat="catelogue in catelogues" value="@{{ catelogue.id }}">@{{
                                    catelogue.ten }}
                                </option>
                            </select>
                        </div>
                        <div class="col-4 mb-3">
                            <select class="form-select form-select-lg" ng-model="selectedList"
                                    ng-change="filterMovies()">
                                <option value="">Danh sách</option>
                                <option ng-repeat="list in lists" value="@{{ list.id }}">@{{ list.ten }}</option>
                            </select>
                        </div>
                        <div class="col-4 mb-3">
                            <select class="form-select form-select-lg" ng-model="selectedYear"
                                    ng-change="filterMovies()">
                                <option value="">Năm phát hành</option>
                                @for($nam = 1990; $nam <= date('Y'); $nam ++)
                                    <option value="{{$nam}}">{{$nam}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-4 mb-3">
                            <button type="button" class="btn btn-danger btn-lg w-100" ng-click="reset()">Đặt lại
                            </button>
                        </div>
                    </div>

                </form>
                <div class="row mt-5">
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2 movie-card mb-3 mt-3"
                         ng-repeat="item in filteredMovies">
                        <a href="/detail/@{{ item.slug }}" class="nav-link position-relative" data-bs-toggle="tooltip"
                           title="@{{ item.ten }}">
                            <img src="@{{item.anh}}" alt="" class="img-fluid">
                                <span ng-show="item.gia >=1" class="badge bg-danger rounded-pill position-absolute top-0 end-0">
                                     <i class="fa-solid fa-crown"></i> Có phí
                                    </span>
                                <span ng-show="item.is_vip == true" class="badge bg-warning rounded-pill position-absolute top-0 end-0">
                                     <i class="fa-solid fa-crown"></i> Vip
                                    </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('js')
        <script>
            viewFunction = function ($scope, $http) {
                $scope.listMovie = [];
                $scope.filteredMovies = [];
                $scope.catelogues = [];
                $scope.lists = [];
                $scope.movieCatelogue = [];
                $scope.searchText = "";
                $scope.selectedCatalogue = "";
                $scope.selectedList = "";
                $scope.selectedYear = "";

                $http.get('api/movie')
                    .then(function (res) {
                        $scope.listMovie = res.data.data;
                        $scope.filteredMovies = $scope.listMovie;
                        $scope.catelogues = res.data.dataCatelogues;
                        $scope.lists = res.data.dataLists;
                        $scope.movieCatelogue = res.data.dataMovieCateloge;
                        console.log($scope.movieCatelogue)
                    });

                $scope.filterMovies = function () {
                    // Lọc danh sách phim ($scope.listMovie)
                    $scope.filteredMovies = $scope.listMovie.filter(function (item) {
                        return (
                            // Kiểm tra tên phim có chứa searchText (từ khóa tìm kiếm) không
                            (!$scope.searchText || item.ten.toLowerCase().includes($scope.searchText.toLowerCase())) &&
                            // Kiểm tra phim thuộc thể loại đã chọn ($scope.selectedCatalogue)
                            (!$scope.selectedCatalogue || $scope.movieCatelogue.some(function (mc) {
                                return mc.movie_id === item.id && mc.catelogue_id == $scope.selectedCatalogue;
                            })) &&
                            // Kiểm tra phim thuộc danh sách đã chọn ($scope.selectedList)
                            (!$scope.selectedList || item.list_id == $scope.selectedList) &&
                            // Kiểm tra phim phát hành vào năm đã chọn ($scope.selectedYear)
                            (!$scope.selectedYear || item.nam_phat_hanh == $scope.selectedYear)
                        );
                    });
                };


                $scope.reset = () => {
                    $scope.searchText = "";
                    $scope.selectedCatalogue = "";
                    $scope.selectedList = "";
                    $scope.selectedYear = "";
                    $scope.filteredMovies = $scope.listMovie;
                }

            }
        </script>
    @endsection
@endsection
