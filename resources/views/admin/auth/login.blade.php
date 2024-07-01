<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css.css">
</head>
<body>
<div class="container d-flex justify-content-center align-items-center min-vh-100 bg-pan-top">
    <div class="card login-box slide-in-elliptic-right-bck">
        <div class="card-body">
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
