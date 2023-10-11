@extends('layout.master')

@section('judul')
    Reset Password
@endsection

@section('content')
<style>
    .login-link {
        color: #023349; /* Warna tautan */
        text-decoration: none;
        transition: color 0.3s, border-bottom-color 0.3s;
        border-bottom: 1px solid transparent; /* Garis bawah awal */
    }

    .login-link:hover {
        color: #0056b3; /* Warna tautan saat dihover */
        border-bottom-color: #0056b3; /* Warna garis bawah saat dihover */
    }
</style>

<div class="container">
    <div class="card">
        <h2 class="card-header">Reset Password</h2>
        <div class="card-body">
            @if(session('success'))
                <div id="success-reset" class="alert alert-warning">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div id="error-reset" class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.reset', ['token' => $token]) }}">
                @csrf
                <input type="hidden" name="username" value="{{ $username }}">

                <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required autocomplete="new-password">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-warning">Ubah Password</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Ambil elemen pesan flash session
    const successAlert = document.getElementById('success-reset');
    const errorAlert = document.getElementById('error-reset');

    // Cek apakah elemen pesan ada dan sembunyikan setelah 10 detik
    if (successAlert) {
        setTimeout(function() {
            successAlert.style.display = 'none';
        }, 10000); // 10 detik
    }

    if (errorAlert) {
        setTimeout(function() {
            errorAlert.style.display = 'none';
        }, 10000); // 10 detik
    }
</script>
@endsection
