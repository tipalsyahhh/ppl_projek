<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('desain/css/register.css') }}">
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
    <div class="card animate__animated animate__fadeIn">
        <h2 class="card-header">Register</h2>
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="inputNamaDepan" class="form-label"><span>Nama Depan</span></label>
                    <input type="text" name="namadepan" class="form-control" value="{{ old('namadepan') }}" required>
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
                <a href="{{ route('login') }}" class="login-link">Sudah memiliki akun? Kembali ke login</a>
            </div>
        </div>
    </div>
</body>

</html>
