@extends('layout.master')

@section('content')
    <h1>Profil Pengguna</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        @if ($userProfile->user->profileImage)
            <img src="{{ asset('storage/' . $userProfile->user->profileImage->image_path) }}" class="card-img-top" alt="Foto Profil {{ $userProfile->user->namadepan }} {{ $userProfile->user->namabelakang }}">
        @else
            <!-- Tampilkan foto profil default jika tidak ada foto profil -->
            <img src="{{ asset('path-to-default-image.jpg') }}" class="card-img-top" alt="Foto Profil Default">
        @endif

        <div class="card-body">
            <h5 class="card-title">{{ $userProfile->nama_depan }} {{ $userProfile->nama_belakang }}</h5>
            <p class="card-text">Alamat: {{ $userProfile->alamat }}</p> <!-- Tampilkan alamat -->
            <p class="card-text">Tanggal Lahir: {{ $userProfile->tanggal_lahir }}</p> <!-- Tampilkan tanggal lahir -->
            <!-- Tampilkan info profil lainnya sesuai kebutuhan Anda -->
        </div>
    </div>
</div>
@endsection
