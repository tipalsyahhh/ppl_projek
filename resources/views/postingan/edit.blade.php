@extends('layout.master')

@section('judul')
    Edit Postingan
@endsection

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

@section('content')
<form method="post" action="{{ route('postingan.update', ['id' => $postingan->id]) }}" enctype="multipart/form-data">
    @if(session('success'))
    <div id="success-alert" class="alert alert-warning">
        {{ session('success') }}
    </div>
    @endif
    @csrf
    @method('PUT') <!-- Menggunakan metode PUT untuk update -->

    <div class="form-group">
        <label>Nama Menu</label>
        <input type="text" name="nama_menu" value="{{ $postingan->nama_menu }}" class="form-control">
    </div>

    @error('nama_menu')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Harga</label>
        <input type="text" name="harga" value="{{ $postingan->harga }}" class="form-control">
    </div>

    @error('harga')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Deskripsi</label>
        <textarea class="form-control" name="deskripsi">{{ $postingan->deskripsi }}</textarea>
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

    <button type="submit" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Simpan</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('btn-update').addEventListener('click', function () {
        Swal.fire({
            title: "Konfirmasi",
            text: "Apakah Anda ingin menyimpan perubahan?",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#5d7eeb",
            cancelButtonColor: "#5d7eeb",
            confirmButtonText: "Ya",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('update-form').submit();
            }
        });
    });
</script>

<script>
    // Ambil elemen pesan flash session
    const successAlert = document.getElementById('success-alert');

    // Cek apakah elemen pesan ada
    if (successAlert) {
        // Setelah 10 detik, sembunyikan elemen pesan
        setTimeout(function() {
            successAlert.style.display = 'none';
        }, 10000); // 10 detik
    }
</script>
@endsection
