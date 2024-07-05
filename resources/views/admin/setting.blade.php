@extends('admin.layouts.master')

@section('title', 'Cài đặt')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12 bg-light py-3">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0 text-dark">
                        <li class="breadcrumb-item"><a href="javascript:void(0);" class="nav-link">@yield('title')</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="d-flex justify-content-between mt-3 mb-3">
        <h1 class="text-center h3">Cài đặt</h1>
    </div>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mt-3">
        <div class="card-body">
            <form action="{{ route('admin.settings.update', $data[0]->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="banner_video">Video 1</label>
                    <input type="file" class="form-control" id="banner_video" name="banner_video">
                    <video src="{{ \Storage::url($data[0]->banner_video) }}" controls width="200px"></video>
                </div>

                <div class="form-group">
                    <label for="tieu_de">Tiêu đề 1</label>
                    <input type="text" id="tieu_de" name="tieu_de" class="form-control" value="{{ $data[0]->tieu_de }}">
                </div>

                <div class="form-group">
                    <label for="noi_dung">Nội dung 1</label>
                    <input type="text" id="noi_dung" name="noi_dung" class="form-control" value="{{ $data[0]->noi_dung }}">
                </div>
                <hr>
                <div class="form-group">
                    <label for="banner_video">Video 2</label>
                    <input type="file" class="form-control" id="banner_video" name="banner_video_2">
                    <video src="{{ \Storage::url($data[0]->banner_video_2) }}" controls width="200px"></video>
                </div>
                <div class="form-group">
                    <label for="tieu_de">Tiêu đề 2</label>
                    <input type="text" id="tieu_de" name="tieu_de_2" class="form-control" value="{{ $data[0]->tieu_de_2 }}">
                </div>

                <div class="form-group">
                    <label for="noi_dung">Nội dung 2</label>
                    <input type="text" id="noi_dung" name="noi_dung_2" class="form-control" value="{{ $data[0]->noi_dung_2 }}">
                </div>

                <button type="submit" class="btn btn-success mt-4">Gửi</button>
            </form>
        </div>
    </div>
@endsection
