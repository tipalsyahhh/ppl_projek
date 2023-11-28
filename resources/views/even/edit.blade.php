@extends('layout.master')

@section('content')
    <div class="container">
        <h1>Edit Even</h1>

        <form action="{{ route('even.update', $even->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_even">Nama Even:</label>
                <input type="text" name="nama_even" class="form-control" value="{{ $even->nama_even }}" required>
            </div>

            <div class="form-group">
                <label for="tanggal_acara">Tanggal Acara:</label>
                <input type="datetime-local" name="tanggal_acara" class="form-control" value="{{ $even->tanggal_acara }}" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea name="deskripsi" class="form-control" rows="4" required>{{ $even->deskripsi }}</textarea>
            </div>

            <div class="form-group">
                <label for="harga_tiket">Harga Tiket:</label>
                <input type="number" name="harga_tiket" class="form-control" value="{{ $even->harga_tiket }}" required>
            </div>

            <div class="form-group">
                <label for="image">Gambar:</label>
                <input type="file" name="image" class="form-control" accept="image/*">
                <img src="{{ asset('storage/'.$even->image) }}" alt="Even Image" class="img-thumbnail mt-2" width="200">
            </div>

            <button type="submit" class="btn btn-primary">Update Even</button>
        </form>
    </div>
@endsection
