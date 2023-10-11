<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('desain/css/login.css')}}">
    <style>
        body {
    background-image: url("{{ asset('img/bacground1.jpg') }}");
    background-repeat: no-repeat;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    background-color: #f2f2f2;
    }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-body">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo">
            <center><h3><span id="loginText"></span></h3></center>
            @if(session()->has('error'))
                <div id="success-alert" class="alert alert-primary">
                    {{ session('error') }}
                </div>
            @endif
            <form method="POST" action="{{ route('login.authenticate') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="user" class="form-login" value="{{ old('user') }}" id="inputUsername" placeholder="" required>
                    <label for="inputUsername" class="input-label"><i class="bi bi-person-fill"></i> Username</label>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-login" id="inputPassword" placeholder="" required>
                    <label for="inputPassword" class="input-label"><i class="bi bi-lock-fill"></i> Password</label>
                </div>
                <div class="form-group">
                    <input type="submit" name="login" class="btn-login" value="LOG IN">
                </div>
            </form>
            <div class="text-center">
                <a href="{{ route('register') }}" class="login-link">Belum punya akun? Daftar sekarang!</a>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('desain/js/login.js') }}"></script>
</body>
</html>
