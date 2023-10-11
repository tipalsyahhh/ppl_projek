@extends('layout.master')

@section('judul')
    Edit Foto Profil
@endsection

@section('content')
    <h1>Edit Foto Profil</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('foto-profile.update', ['user_id' => $user->id]) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="image">Pilih Gambar Profil:</label>
            <input type="file" name="image" id="image" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
