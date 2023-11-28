<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('desain/css/login.css') }}">
    <style>
        body {
            background-image: url("{{ asset('img/bacground1.jpeg') }}");
            backdrop-filter: blur(6px) grayscale(5%);
            min-width: 350px;
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
        <div class="login">
            <center>
                <h3><span id="loginText"></span></h3>
                @if (session()->has('error'))
                    <div id="success-alert" class="alert alert-primary">
                        {{ session('error') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('login.authenticate') }}" id="form-case">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="user" class="form-login" value="{{ old('user') }}"
                            id="inputUsername" placeholder="Username" required>

                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-login" id="inputPassword"
                            placeholder="Password" required>

                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" class="btn-login" value="LOG IN">
                    </div>
                </form>
            </center>
            <div class="text-center">
                <p class="login-link" onclick="changeToRegister()">Belum punya akun? Daftar sekarang!</p>
            </div>
        </div>

        <div class="register" style="display: none">
            <center>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label for="inputNamaDepan" class="form-label"><span>Nama Depan</span></label>
                        <input type="text" name="namadepan" class="form-control" value="{{ old('namadepan') }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="inputNamaBelakang" class="form-label"><span>Nama Belakang</span></label>
                        <input type="text" name="namabelakang" class="form-control" value="{{ old('namabelakang') }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="inputUsername" class="form-label"><span>Username</span></label>
                        <input type="text" name="user" class="form-control" value="{{ old('user') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="form-label"><span>Password</span></label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <label class="form-label"><span>Gender</span></label>
                    <div class="gender-options">
                        <label><input type="radio" name="gender" value="male"> Male</label>
                        <label><input type="radio" name="gender" value="female"> Female</label>
                    </div>
                    <div class="form-group">
                        <!-- Input remember_token yang tersembunyi -->
                        <input type="hidden" name="remember_token"
                            value="{{ substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'), 0, 60) }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn"><i class="bi bi-cloud-plus"></i> Daftar</button>
                    </div>
                </form>
                <div class="text-center">
                    <p onclick="changeToLogin()" class="login-link">Sudah memiliki akun? Kembali ke login</p>
                </div>
            </center>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('desain/js/login.js') }}"></script>
</body>

</html>
