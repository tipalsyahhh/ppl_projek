@extends('layout.master')

@section('content')
    <div class="container">
        <h1>Create Even</h1>

        <form action="{{ route('even.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_even">Nama Even:</label>
                <input type="text" name="nama_even" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="tanggal_acara">Tanggal Acara:</label>
                <input type="datetime-local" name="tanggal_acara" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="harga_tiket">Harga Tiket:</label>
                <input type="number" name="harga_tiket" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="image">Gambar:</label>
                <input type="file" name="image" class="form-control" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Even</button>
        </form>
    </div>
@endsection
