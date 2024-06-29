@extends('admin.layouts.master')
@section('content')
    <div>
        <h1 class="text-center h3">Cập nhật bài viết</h1>
        <form action="{{route('admin.posts.update',$model[0]['id'])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
            <div class="row">
                <div class="mt-3 col-6">
                    <label class="form-label">Tiêu đề</label>
                    <input type="text" name="tieu_de" id="" class="form-control" value="{{$model[0]['tieu_de']}}">
                </div>
                <div class="mt-3 col-6">
                    <label class="form-label">Ảnh</label>
                    <input type="file" name="anh" id="" class="form-control">
                    <img src="{{$model[0]['anh']}}" alt="" width="100px">
                </div>
                <div class="mt-3 col-6">
                    <label class="form-label">Danh mục: </label>
                    <select type="text" name="catelogue_post_id" id="" class="form-select">
                        <option>Chọn danh mục</option>
                        @foreach($dataCateloguePost as $cate)
                            <option value="{{$cate->id}}" @if($model[0]['catelogue_post_id'] == $cate->id) selected @endif>{{$cate->ten}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3 col-6">
                    <label class="form-label">Tag: </label>
                    <select type="text" name="tag[]" id="" class="form-select" multiple>
                        @foreach($dataTags as $tag)
                            @foreach($model[0]['tags'] as $tagP)
                                @php
                                $status = "";
                                     if($tag->id == $tagP['id']){
                                         $status = "selected";
                                         break;
                                     }
                                    @endphp
                            @endforeach
                                <option value="{{$tag->id}}" {{$status}}>{{$tag->ten}}</option>
                            @endforeach

                    </select>
                </div>
                <div class="mt-3 col-6">
                    <label class="form-label">Nội dung: </label>
                    <textarea name="noi_dung">{{$model[0]['noi_dung']}}</textarea>
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

