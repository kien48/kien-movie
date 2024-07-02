<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>

        body {
            background: linear-gradient(135deg, #1a1a1a, #333333);
        }

        .login-box {
            background: rgba(0, 0, 0, 0.75);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.5);
        }

        .card-title {
            margin-bottom: 20px;
        }

        .form-group label {
            color: #ffffff;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.1);
            color: #ffffff;
            border: none;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.2);
            border-color: #ff0000;
            box-shadow: none;
        }
        .slide-in-elliptic-right-bck {
            -webkit-animation: slide-in-elliptic-right-bck 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
            animation: slide-in-elliptic-right-bck 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }

        @-webkit-keyframes slide-in-elliptic-right-bck {
            0% {
                -webkit-transform: translateX(800px) rotateY(30deg) scale(6.5);
                transform: translateX(800px) rotateY(30deg) scale(6.5);
                -webkit-transform-origin: -100% 50%;
                transform-origin: -100% 50%;
                opacity: 0;
            }
            100% {
                -webkit-transform: translateX(0) rotateY(0) scale(1);
                transform: translateX(0) rotateY(0) scale(1);
                -webkit-transform-origin: 600px 50%;
                transform-origin: 600px 50%;
                opacity: 1;
            }
        }
        @keyframes slide-in-elliptic-right-bck {
            0% {
                -webkit-transform: translateX(800px) rotateY(30deg) scale(6.5);
                transform: translateX(800px) rotateY(30deg) scale(6.5);
                -webkit-transform-origin: -100% 50%;
                transform-origin: -100% 50%;
                opacity: 0;
            }
            100% {
                -webkit-transform: translateX(0) rotateY(0) scale(1);
                transform: translateX(0) rotateY(0) scale(1);
                -webkit-transform-origin: 600px 50%;
                transform-origin: 600px 50%;
                opacity: 1;
            }
        }
        .bg-pan-top {
            -webkit-animation: bg-pan-top 8s both;
            animation: bg-pan-top 8s both;
        }

        @-webkit-keyframes bg-pan-top {
            0% {
                background-position: 50% 100%;
            }
            100% {
                background-position: 50% 0%;
            }
        }
        @keyframes bg-pan-top {
            0% {
                background-position: 50% 100%;
            }
            100% {
                background-position: 50% 0%;
            }
        }

    </style>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center min-vh-100 bg-pan-top">
    <div class="card login-box ">
        <div class="card-body slide-in-elliptic-right-bck">
            <h2 class="card-title text-center text-danger text-pop-up-top">Admin Login</h2>
            <form action="{{route('admin.login')}}" method="POST">
                @csrf
                @if((session('error')))
                    <li>{{session('error')}}</li>
                @endif
                <div class="form-group">
                    <label for="email" class="text-light">Email</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>
                <div class="form-group">
                    <label for="password" class="text-light">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>
                <button type="submit" class="btn btn-danger btn-block">Login</button>
            </form>
        </div>
    </div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
