@extends('layout.master')

<style>
    .modal-even {
        display: flex;
        margin: 10px;
        padding: 0.5rem;
    }

    .image-even {
        flex: 1;
    }

    .image-even img {
        width: 100%;
        height: auto;
    }

    .isi-even {
        flex: 2;
        padding: 10px;
    }

    /* Optional: Add styling for the content */
    .isi-even p {
        margin-bottom: 10px;
    }

    /* Optional: Add styling for the container */
    .container {
        margin-top: 20px;
    }
</style>
@section('content')
<div class="modal-content">
    <div class="modal-even">
        @foreach($evens as $even)
        <div class="image-even">
            <img src="{{ asset('storage/'.$even->image) }}" alt="Even Image">
        </div>
        <div class="isi-even">
            <p><strong>Even:</strong> {{ $even->nama_even }}</p>
            <p><strong>Tanggal Acara:</strong> {{ $even->tanggal_acara }}</p>
            <p><strong>Deskripsi:</strong> {{ $even->deskripsi }}</p>
            <p><strong>Harga Tiket:</strong> {{ $even->harga_tiket }}</p>
            <p><strong>Status Even:</strong> {{ $even->status_even }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection