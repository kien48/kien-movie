<?php

use App\Models\CateloguePost;
use App\Models\Post;
use App\Models\TagPost;

$postHot = Post::query()->where('catelogue_post_id', '!=', 3)
    ->orderByDesc('luot_xem')
    ->limit(4)->get();

$tags = TagPost::query()->get();

$danhMuc = CateloguePost::query()->where('id', '!=', 3)->get();
?>

@extends('layouts.master')
@section('title')
    Tin tức
@endsection
@section('css')
    <style>

        body {
            background-color: #f4f4f9;
            color: #333;
        }

        /* Header styles */
        .headered {
            text-align: center;
            padding: 50px 0;
        }

        .headered h1 {
            font-size: 3rem;
            color: #1e1e2f;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 2px;
        }

        /* Content area */
        .content {
            display: flex;
            gap: 20px;
        }

        .main-content {
            flex: 2;
        }

        .sidebar {
            flex: 1;
        }

        /* Post, widget, box styles */
        .post,
        .widget,
        .box {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .post:hover,
        .widget:hover,
        .box:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
        }

        .post h4,
        .widget h3,
        .box h3 {
            font-size: 1.8rem;
            color: #1e1e2f;
            margin-bottom: 15px;
        }

        .post img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .widget ul,
        .box .categories,
        .box .tags {
            list-style: none;
            padding: 0;
        }

        .widget ul li,
        .box .categories a,
        .box .tags a {
            margin-bottom: 10px;
        }

        .widget ul li a,
        .box .categories a,
        .box .tags a {
            text-decoration: none;
            color: #fff;
            background-color: #1e1e2f;
            padding: 10px 20px;
            border-radius: 20px;
            display: inline-block;
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
        }

        .widget ul li a:hover,
        .box .categories a:hover,
        .box .tags a:hover {
            background-color: #ff3333;
            color: #fff;
        }

        /* Sidebar specific styles */
        .widget {
            background-color: #f4f4f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .widget h3 {
            font-size: 2rem;
            color: #1e1e2f;
            margin-bottom: 15px;
        }

        /* Box specific styles */
        .box {
            background-color: #f4f4f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .box h3 {
            font-size: 2rem;
            color: #1e1e2f;
            margin-bottom: 15px;
        }

        .box .categories a,
        .box .tags a {
            background-color: #1e1e2f;
            color: #fff;
            border: 2px solid #1e1e2f;
            padding: 8px 16px;
            border-radius: 20px;
            display: inline-block;
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
        }

        .box .categories a:hover,
        .box .tags a:hover {
            background-color: #ff3333;
            border-color: #ff3333;
            color: #fff;
            transform: scale(1.1);
        }


    </style>
@endsection
@section('content')
    <div class="container">
        <header class="headered">
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
                    @foreach($danhMuc as $item)
                        <a href="{{route('danhMucBaiViet',[$item->id,$item->slug])}}">{{$item->ten}}</a>
                    @endforeach
                </div>
            </div>
            <div class="box">
                <h3>Tags</h3>
                <div class="tags">
                    @foreach($tags as $item)
                        <a href="{{route('tagBaiViet',[$item->id,$item->slug])}}">{{$item->ten}}</a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
