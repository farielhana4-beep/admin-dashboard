<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>

<link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

</head>

<body class="hold-transition login-page">

<div class="login-box">
    <div class="login-logo">
        <b>Faril</b> Dashboard
    </div>

    <div class="card">
        <div class="card-body login-card-body">

            <p class="login-box-msg">Login dulu bro</p>

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="/login" method="POST">
                @csrf

                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <button class="btn btn-primary btn-block">Login</button>

            </form>

        </div>
    </div>
</div>

</body>
</html>