@extends('layout.master')

@section('judul')
    Unggah Gambar Profil
@endsection

@section('content')
<form method="post" action="{{ route('profile.uploadImage') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="image">Unggah Gambar Profil</label>
        <input type="file" name="image" class="form-control-file" id="image">
    </div>

    @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-warning"><i class="bi bi-upload"></i> Unggah Gambar Profil</button>
</form>
@endsection