@extends('layout.master')

<style>
.card {
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin: 20px;
    padding: 20px;
    background-color: #fff;
}

.card-body {
    text-align: left;
    width: 100%;
}

.card-title {
    font-size: 24px;
    margin-top: 10px;
}

.card-text {
    font-size: 18px;
    margin-top: 10px;
}

.card img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    margin-top: 20px;
}
</style>


@section('content')
@section('tabel')
    Cekout
@endsection
<div class="container">
    <h1>Detail Postingan</h1>
    <div class="card">
        <div class="card-header">
            Postingan ID: {{ $postingan->id}}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $postingan->nama_menu }}</h5>
            <p class="card-text">Harga: Rp {{ $postingan->harga }}</p>
            <p class="card-text">Deskripsi: {{ $postingan->deskripsi }}</p>
            
            <!-- Tampilkan gambar dengan menggunakan tag <img> -->
            <img src="{{ asset($postingan->image) }}" alt="Gambar Postingan" width="300" height="200">
            
            <!-- Tambahkan elemen HTML lainnya sesuai kebutuhan -->
        </div>
    </div>
    <a href="{{ route('pages.welcome') }}" class="btn btn-primary mt-3">Kembali</a>
    <a href="{{ route('products.create') }}" class="btn btn-primary mt-3">Cekout</a>
</div>
@endsection
