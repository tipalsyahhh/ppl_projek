@extends('layout.master')
<<<<<<< HEAD
<link rel="stylesheet" href="{{ asset('desain/css/detail.css')}}">

@section('content')
@section('tabel')
Detail Postingan
=======

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
    Pesan Sekarang
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
@endsection
<div class="card1">
    <div class="card-body">
        <div class="isi-detal">
            <img src="{{ asset($postingan->image) }}" class="image-detail" alt="Gambar Postingan" data-toggle="modal"
                data-target="#imageModal">
            <!-- Modal untuk memperbesar gambar -->
            <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <img src="{{ asset($postingan->image) }}" alt="Gambar Postingan" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <div class="asu">
                <h5 class="card-title">{{ $postingan->nama_menu }}</h5>
                <div class="detail-icon">
                    <p class="card-text"><i class="fas fa-tags"></i> {{ $postingan->jenis }}</p>
                    <p class="card-text"><i class="fas fa-user"></i> {{ $postingan->kapasitas }}</p>
                    <p class="card-text no-border">Terjual : {{ $jumlahBeli }}</p>
                </div>
                <div class="harga">
                    <p class="card-text">Harga: Rp {{ $postingan->harga }}</p>
                </div>
                <div class="garis"></div>
                <div class="isi-text">
                    <img src="{{ asset('storage/kedu.png') }}" alt="Deskripsi Gambar">
                    <p style="color:#080808;">pantai kedu warna</p>
                    <p>Keamanan terjamin</p>
                </div>
            </div>
        </div>
<<<<<<< HEAD
        <div class="btn-detail">
            <a href="{{ route('pages.welcome') }}" class="btn btn-warning"><i class="bi bi-arrow-return-left"></i>
                Kembali</a>
                <a href="{{ route('products.create', ['postingan_id' => $postingan->id]) }}" class="btn btn-warning">
                    <i class="bi bi-bag-plus"></i> Pesan sekarang
                </a>
        <div class="garis-hp"></div>
        <div class="isi-text-hp">
            <img src="{{ asset('storage/kedu.png') }}" alt="Deskripsi Gambar">
            <p style="color:#080808;">kedu warna</p>
            <p>Keamanan terjamin</p>
=======
        <div class="card-body">
            <h5 class="card-title">{{ $postingan->nama_menu }}</h5>
            <p class="card-text">Harga: Rp {{ $postingan->harga }}</p>
            <p class="card-text">Deskripsi: {{ $postingan->deskripsi }}</p>
            <p>Terjual : {{ $jumlahBeli }}</p>
            
            <!-- Tampilkan gambar dengan menggunakan tag <img> -->
            <img src="{{ asset($postingan->image) }}" alt="Gambar Postingan" width="300" height="200">
            
            <!-- Tambahkan elemen HTML lainnya sesuai kebutuhan -->
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
        </div>
    </div>
</div>
<!-- Tambahkan tombol untuk memperbesar gambar -->
<div class="description">
    <h3 class="description-isi">Deskripsi:</h3>
    <p>{{ $postingan->deskripsi }}</p>
</div>
<!-- Tambahkan elemen HTML lainnya sesuai kebutuhan -->
@endsection