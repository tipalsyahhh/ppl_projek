@extends('layout.master')

@section('judul')
    Tambah Produk
@endsection

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

@section('content')
<form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Menu</label>
        <select name="menu_id" class="form-control">
            <option value="">Pilih Menu</option>
            @foreach ($menus as $menu)
                <option value="{{ $menu->id }}">{{ $menu->nama_menu }}</option>
            @endforeach
        </select>
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

    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
</form>
@endsection
