@extends('layout.master')

@section('judul')
    Daftar Produk
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            Daftar Produk
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Menu</th>
                        <th>User</th>
                        <th>Alamat</th>
                        <th>Jumlah Beli</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->postingan->nama_menu }}</td>
                            <td>{{ $product->login->user }}</td>
                            <td>{{ $product->alamat->alamat }}</td>
                            <td>{{ $product->jumlah_beli }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('pages.welcome') }}" class="btn btn-primary mt-3">Kembali</a>
        </div>
    </div>
@endsection
