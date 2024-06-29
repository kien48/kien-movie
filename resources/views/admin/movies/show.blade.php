@extends('admin.layouts.master')
@section('title')
    Chi tiết phim
@endsection
@section('content')
    <div >
        <h1 class="text-center h3">Chi tiết phim</h1>
        <div class="card">
            <h3>Thông tin phim</h3>
            <div class="row">
                <div class="col-md-6">
                    <strong>ID:</strong> {{ $modelMovie['id'] }}<br>
                    <strong>Tên:</strong> {{ $modelMovie['ten'] }}<br>
                    <strong>Danh mục:</strong> {{ $modelMovie['lists']['ten'] }}<br>
                    <strong>Ngôn ngữ:</strong> {{ $modelMovie['ngon_ngu'] }}<br>
                    <strong>Số tập:</strong> {{ $modelMovie['so_tap'] }}<br>
                    <strong>Chất lượng:</strong> {{ $modelMovie['chat_luong'] }}<br>
                    <strong>Đạo diễn:</strong> {{ $modelMovie['dao_dien'] }}<br>
                    <strong>Ảnh:</strong><br>
                    <img src="{{ $modelMovie['anh'] }}" alt="{{ $modelMovie['ten'] }}" class="img-thumbnail" width="100px"><br><br>
                </div>
                <div class="col-md-6">

                    <strong>Đường dẫn:</strong> {{ $modelMovie['slug'] }}<br>
                    <strong>Mô tả:</strong><br>
                    {{ $modelMovie['mo_ta'] }}<br><br>
                    <strong>Diễn viên:</strong> {{ $modelMovie['dien_vien'] }}<br>
                    <strong>Năm phát hành:</strong> {{ $modelMovie['nam_phat_hanh'] }}<br>
                    <strong>Quốc gia:</strong> {{ $modelMovie['quoc_gia'] }}<br>
                    <strong>Trạng thái:</strong> {{ $modelMovie['trang_thai'] }}<br>
                    <strong>Vip:</strong> {{ $modelMovie['is_vip'] }}<br>
                    <strong>Ngày tạo:</strong> {{ $modelMovie['created_at'] }}<br>
                </div>
            </div>
        </div>


        <div class="card">
            <h3>Thể loại</h3>
            <div class="row">
                <div class="col">
                    @foreach($modelCatelogue as $item)
                        <span class="badge bg-secondary">{{$item['ten']}}</span>
                    @endforeach
                </div>
            </div>

        </div>
        <div class="card">
            <h3>Tập phim</h3>
            <div class="row">
                <div class="col">
                    @foreach($modelEpisode as $item)
                        <span class="badge bg-secondary">{{$item['tap']}}</span>
                    @endforeach
                </div>
            </div>

        </div>

    </div>

@endsection
