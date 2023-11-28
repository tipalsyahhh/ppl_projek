@extends('layout.master')

@section('judul')
Tambah Produk
@endsection

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

@section('content')
<form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Yang anda pesan</label>
        <input type="text" class="form-control" value="{{ $postingan->nama_menu }}" readonly>
        <input type="hidden" name="menu_id" value="{{ $postingan->id }}">
    </div>

    @error('menu_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Jumlah Beli</label>
        <input type="text" name="jumlah_beli" value="{{ old('jumlah_beli') }}" class="form-control">
    </div>

    @error('jumlah_beli')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Tanggal Datang</label>
        <input type="datetime-local" name="tanggal_datang" value="{{ old('tanggal_datang') }}" class="form-control">
    </div>

    @error('tanggal_datang')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-warning"><i class="bi bi-save"></i> Pesan</button>
</form>
@endsection