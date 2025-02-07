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
                        <div class="col-3 mb-3">
                            <input type="text" class="form-control form-control-lg" ng-model="searchText"
                                   placeholder="Tìm kiếm tên phim" ng-change="filterMovies()">
                        </div>
                        <div class="col-3 mb-3">
                            <select class="form-select form-select-lg" ng-model="selectedCatalogue"
                                    ng-change="filterMovies()">
                                <option value="">Thể loại</option>
                                <option ng-repeat="catelogue in catelogues" value="@{{ catelogue.id }}">@{{
                                    catelogue.ten }}
                                </option>
                            </select>
                        </div>
                        <div class="col-3 mb-3">
                            <select class="form-select form-select-lg" ng-model="selectedNgonNgu"
                                    ng-change="filterMovies()">
                                <option value="">Ngôn ngữ</option>
                                <option value="Việt Nam">Việt Nam</option>
                                <option value="Vietsub">Vietsub</option>
                                <option value="Lồng tiếng">Lồng tiếng</option>
                            </select>
                        </div>
                        <div class="col-3 mb-3">
                            <select class="form-select form-select-lg" ng-model="selectedQuocGia"
                                    ng-change="filterMovies()">
                                <option value="">Quốc gia</option>
                                <option value="Việt Nam">Việt Nam</option>
                                <option value="Japan">Nhật</option>
                                <option value="China">Trung Quốc</option>
                                <option value="United States of America">Mỹ</option>
                                <option value="United Kingdom">Anh</option>
                                <option value="Argentina">Argentina</option>
                                <option value="South Korea">Hàn Quốc</option>
                            </select>
                        </div>
                        <div class="col-3 mb-3">
                            <select class="form-select form-select-lg" ng-model="selectedList"
                                    ng-change="filterMovies()">
                                <option value="">Danh sách</option>
                                <option ng-repeat="list in lists" value="@{{ list.id }}">@{{ list.ten }}</option>
                            </select>
                        </div>
                        <div class="col-3 mb-3">
                            <select class="form-select form-select-lg" ng-model="selectedYear"
                                    ng-change="filterMovies()">
                                <option value="">Năm phát hành</option>
                                @for($nam = 1990; $nam <= date('Y'); $nam ++)
                                    <option value="{{$nam}}">{{$nam}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-3 mb-3">
                            <select class="form-select form-select-lg" ng-model="selectedPrice"
                                    ng-change="filterMovies()">
                                <option value="">Giá phim</option>
                                <option value="10000">Trên 10,000 xu</option>
                                <option value="20000">Trên 20,000 xu</option>
                                <option value="50000">Trên 50,000 xu</option>
                                <option value="100000">Trên 100,000 xu</option>
                                <option value="200000">Trên 200,000 xu</option>
                            </select>
                        </div>
                        <div class="col-1 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" ng-model="is_vip" ng-change="filterMovies()" type="checkbox" id="check1" name="option1" value="something" checked>
                                <label class="form-check-label">Phim vip</label>
                            </div>
                        </div>
                        <div class="col-2 mb-3">
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
                            <img src="@{{item.anh}}" alt="" class="img-fluid" width="200px">
                                <span ng-show="item.gia >=1" class="badge bg-danger rounded-0 position-absolute top-0 end-0">
                                     <i class="fa-solid fa-crown"></i> Có phí
                                    </span>
                                <span ng-show="item.is_vip == true" class="badge bg-warning rounded-0 position-absolute top-0 end-0">
                                     <i class="fa-solid fa-crown"></i> Vip
                                    </span>
                            <span ng-show="item.trang_thai == 'Full'" class="badge bg-danger rounded-0 position-absolute bottom-0 start-0">
                                 Full
                                </span>
                            <span ng-show="item.trang_thai == 'Đang cập nhật'" class="badge bg-danger rounded-0 position-absolute bottom-0 start-0">
                                 Đang chiếu
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
                $scope.selectedPrice = "";
                $scope.is_vip = false;
                $scope.selectedQuocGia = ""
                $scope.selectedNgonNgu = ""
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
                            (!$scope.selectedYear || item.nam_phat_hanh == $scope.selectedYear) &&
                            (!$scope.selectedPrice || item.gia >= $scope.selectedPrice) &&
                            (!$scope.is_vip || item.is_vip == $scope.is_vip) &&
                            (!$scope.selectedNgonNgu || item.ngon_ngu == $scope.selectedNgonNgu) &&
                            (!$scope.selectedQuocGia || item.quoc_gia == $scope.selectedQuocGia)

                        );
                    });
                };


                $scope.reset = () => {
                    $scope.searchText = "";
                    $scope.selectedCatalogue = "";
                    $scope.selectedList = "";
                    $scope.selectedYear = "";
                    $scope.filteredMovies = $scope.listMovie;
                    $scope.selectedPrice = "";
                    $scope.is_vip = false;
                    $scope.selectedQuocGia = ""
                    $scope.selectedNgonNgu = ""
                }

            }
        </script>
    @endsection
@endsection
