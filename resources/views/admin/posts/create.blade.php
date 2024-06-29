@extends('admin.layouts.master')
@section('content')
    <div>
        <h1 class="text-center h3">Thêm bài viết</h1>
        <form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
            <div class="row">
                <div class="mt-3 col-6">
                    <label class="form-label">Tiêu đề</label>
                    <input type="text" name="tieu_de" id="" class="form-control">
                </div>
                <div class="mt-3 col-6">
                    <label class="form-label">Ảnh</label>
                    <input type="file" name="anh" id="" class="form-control">
                </div>
                <div class="mt-3 col-6">
                    <label class="form-label">Danh mục: </label>
                    <select type="text" name="catelogue_post_id" id="" class="form-select">
                        @foreach($dataCateloguePost as $cate)
                            <option value="{{$cate->id}}">{{$cate->ten}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3 col-6">
                    <label class="form-label">Tag: </label>
                    <select type="text" name="tag[]" id="" class="form-select" multiple>
                        @foreach($dataTags as $tag)
                            <option value="{{$tag->id}}">{{$tag->ten}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3 col-6">
                    <label class="form-label">Nội dung: </label>
                    <textarea name="noi_dung"></textarea>
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-success">Gửi</button>
            </div>

        </form>
    </div>
    @section('js')
        <script src="https:////cdn.ckeditor.com/4.8.0/basic/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'noi_dung' );
        </script>
    @endsection
@endsection

