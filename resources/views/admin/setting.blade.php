@extends('admin.layouts.master')

@section('title', 'Cài đặt')

@section('content')
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
                    <label for="banner_video">Video</label>
                    <input type="file" class="form-control" id="banner_video" name="banner_video">
                    <video src="{{ \Storage::url($data[0]->banner_video) }}" controls width="200px"></video>
                </div>

                <div class="form-group">
                    <label for="tieu_de">Tiêu đề</label>
                    <input type="text" id="tieu_de" name="tieu_de" class="form-control" value="{{ $data[0]->tieu_de }}">
                </div>

                <div class="form-group">
                    <label for="noi_dung">Nội dung</label>
                    <input type="text" id="noi_dung" name="noi_dung" class="form-control" value="{{ $data[0]->noi_dung }}">
                </div>

                <button type="submit" class="btn btn-success mt-4">Gửi</button>
            </form>
        </div>
    </div>
@endsection
