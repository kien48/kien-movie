@extends('layouts.master')
@section('title')
    Tin tức
@endsection
@section('css')
    <style>
        .header {
            text-align: center;
            padding: 30px 0;
        }

        .header h1 {
            font-size: 2.5rem;
            color: #ff3333;
        }

        .content {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .main-content {
            flex: 3;
        }

        .sidebar {
            flex: 1;
        }

        .post, .widget, .box {
            background-color: #2c2c2c;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
        }

        .post h4, .widget h3, .box h3 {
            font-size: 1.5rem;
            color: #ff3333;
            margin-bottom: 10px;
        }

        .post img {
            max-width: 100%;
            border-radius: 10px;
        }

        .widget ul, .box .categories, .box .tags {
            list-style: none;
            padding: 0;
        }

        .widget ul li, .box .categories a, .box .tags a {
            margin-bottom: 10px;
        }

        .widget ul li a, .box .categories a, .box .tags a {
            text-decoration: none;
            color: #fff;
            background-color: #ff3333;
            padding: 10px 20px;
            border-radius: 20px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .widget ul li a:hover, .box .categories a:hover, .box .tags a:hover {
            background-color: #cc0000;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <header class="header">
            <h1>@yield('title-post')</h1>
        </header>
        <div class="content">
            <div class="main-content">
                <div class="row">
                    @yield('content-post')
                </div>
            </div>
            <aside class="sidebar">
                <div class="widget">
                    <h3>Bài viết nổi bật</h3>
                    <ul>
                        @foreach($postHot as $post)
                            <li><a href="{{route('chitiet',$post->slug)}}">{{$post->tieu_de}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </aside>
        </div>
        @if(Route::CurrentRouteName() == "blogs")
            <div class="box">
                <h3>Danh mục</h3>
                <div class="categories">
                    @foreach($danhMuc as $key=>$value)
                        <a href="#">{{$value}}</a>
                    @endforeach
                </div>
            </div>
            <div class="box">
                <h3>Tags</h3>
                <div class="tags">
                    @foreach($tags as $key=>$value)
                        <a href="#">{{$value}}</a> @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
