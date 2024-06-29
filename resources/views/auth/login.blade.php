@extends('layouts.master')
@section('title')
    Đăng nhập
@endsection
@section('css')
    <style>
        body {
            background: url('https://raw.githubusercontent.com/thatanjan/netflix-clone-yt/youtube/media//banner.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
        }
        .login-container {
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
        }

        .login-container .form-control {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: none;
        }
        .login-container .form-control:focus {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }
        .login-container .btn {
            background-color: red;
            border: none;
        }
        .login-container .btn:hover {
            background-color: darkred;
        }
        .form-control:hover {
            background-color: white;
        }
    </style>
 @endsection
@section('content')
       <div class="row justify-content-center">
           <div class="col-md-4">
               <div class="login-container text-center">
                   <h2>Đăng nhập</h2>
                   <form method="POST" action="{{ route('login') }}">
                       @csrf
                       <label for="email" class="col-md-4 col-form-label">{{ __('Email') }}</label>

                       <div class="col-md-12">
                           <input placeholder="Điền email!" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                           @error('email')
                           <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                           @enderror
                       </div>
                       <label for="password" class="col-md-4 col-form-label">{{ __('Mật khẩu') }}</label>

                       <div class="col-md-12">
                           <input placeholder="Điền mật khẩu!" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                           @error('password')
                           <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                           @enderror
                       </div>
                       <div class="row mb-3">
                           <div class="col">
                               <div class="form-check d-flex">
                                   <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                   <label class="form-check-label ms-2" for="remember">
                                       {{ __('Ghi nhớ tôi') }}
                                   </label>
                               </div>
                           </div>
                       </div>
                       <button type="submit" class="btn btn-block mt-4 w-100">Gửi</button>
                   </form>
                   <div class="mt-3">
                       <p>Hoặc</p>
                       <p><a href="#">Quên mật khẩu?</a></p>
                       <p>Chưa có tài khoản? <a href="{{route('register')}}">Đằng ký ngay...</a></p>
                   </div>
               </div>
           </div>
       </div>
@endsection
