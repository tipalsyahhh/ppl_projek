@extends('layout.master')

@section('judul')
    Tambah Postingan
@endsection

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

@section('content')
<form method="post" action="{{ route('postingan.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama_menu" value="{{ old('nama_menu') }}" class="form-control">
    </div>

    @error('nama_menu')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Harga</label>
        <input type="text" name="harga" value="{{ old('harga') }}" class="form-control">
    </div>

    @error('harga')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Deskripsi</label>
        <textarea class="form-control" name="deskripsi">{{ old('deskripsi') }}</textarea>
    </div>

    @error('deskripsi')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Gambar</label>
        <input type="file" name="image" class="form-control">
    </div>

    @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
</form>
@endsection
