<?php
use App\Models\Lists;
$lists = Lists::query()->pluck('ten', 'id')->all();
?>

<header id="trangchu">
    <nav class="navbar navbar-expand-lg navbar- fixed-top shadow fw-bold" style="backdrop-filter: blur(10px);">
        <div class="container">
            <a class="navbar-brand bounce-in-top" href="{{route('home')}}">KienMovie</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" style="margin-left: 10px;">
                    @if(Route::CurrentRouteName() == "home")
                        <li class="nav-item">
                            <a class="nav-link" href="#phimle">Phim lẻ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#phimbo">Phim bộ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tv">TV Shows</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#phimsapchieu">Phim sắp chiếu</a>
                        </li>
                    @else
                        @foreach($lists as $key=>$value)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('lists',$key)}}">{{$value}}</a>
                            </li>
                        @endforeach
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('quy-phat-trien')}}">Quỹ phát triển</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('blogs')}}">Blogs</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('search')}}">
                            <button class="btn btn-outline-light border-0"><i
                                    class="fa-solid fa-magnifying-glass h5"></i></button>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="{{route('favourite')}}">
                            <button class="btn btn-outline-danger border-0"><i class="fa-regular fa-heart h5"></i>
                            </button>
                        </a>
                    </li>
                    @if(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link " href="">
                                <button class="btn btn-outline-light border-0" type="button" data-bs-toggle="offcanvas"
                                        data-bs-target="#demo1"><i class="fa-regular fa-bell h5"></i>
                                    <span class="badge rounded-pill bg-danger " style="margin-left: -10px">@{{ demThongBao }}</span>
                                </button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('index')}}">
                                <button
                                    class="btn @if(Auth::user()->is_vip == 1) btn-outline-warning @else btn-outline-light @endif">
                                    <i class="fa-solid fa-user"></i> {{Auth::user()->name}} </button>
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('register')}}">
                                <button class="btn btn-outline-warning"><i class="fa-solid fa-user-plus"></i> Đăng ký
                                </button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('login')}}">
                                <button class="btn btn-danger"><i class="fa-regular fa-user"></i> Đăng nhập</button>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
