@extends('layout.master')

@section('judul')
    Tambah Profil Pengguna
@endsection

@section('content')
    <form method="post" action="{{ route('dataAkun.store') }}">
        @csrf
        <div class="form-group">
            <label>Nama Depan</label>
            <input type="text" name="nama_depan" value="{{ old('nama_depan') }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Nama Belakang</label>
            <input type="text" name="nama_belakang" value="{{ old('nama_belakang') }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" value="{{ old('alamat') }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Biodata</label>
            <input type="text" name="biodata" value="{{ old('biodata') }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Gender</label>
            <select name="gender" class="form-control">
                <option disabled selected>Pilih Gender</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <button type="submit" class="btn btn-warning"><i class="bi bi-save"></i> Simpan</button>
    </form>
@endsection
