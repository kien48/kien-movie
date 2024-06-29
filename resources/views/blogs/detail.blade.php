@extends('blogs.blogs')
@section('title')
    {{$model->tieu_de}}
@endsection
@section('content-post')
    <h1 class="text-danger">{{$model->tieu_de}}</h1>
    <div class="d-flex mt-3 mb-4  justify-content-between">
        <div>
          <h4>Người đăng: {{$model->user_id}}</h4>
        </div>
        <div>
            <h4>Đăng ngày: {{$model->created_at}}</h4>
        </div>
    </div>
    @php
        $text = htmlspecialchars($model->noi_dung);
        $text = html_entity_decode($text);
        echo $text;
        @endphp
    <div class="box">
        <h3>Danh mục</h3>
        <div class="categories">
                <a href="#">{{$cate['ten']}}</a>
        </div>
    </div>
    <div class="box">
        <h3>Tags</h3>
        <div class="tags">
            @foreach($tags as $item)
{{--                {{dd($item['ten'])}}--}}
                <a href="#">{{$item['ten']}}</a> @endforeach
        </div>
    </div>
@endsection

