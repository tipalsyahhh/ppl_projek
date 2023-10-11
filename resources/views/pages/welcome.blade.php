@extends('layout.master')

@php
    use Illuminate\Support\Facades\Auth;
@endphp

@section('judul')
welcome
@endsection

@section('tabel')
    Pilih Menu Kesukaan Mu
@endsection

@push('style')
    <!-- Tambahkan style SweetAlert jika belum ditambahkan -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .product-card {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            max-width: 100%; /* Kartu akan menyesuaikan lebar layar */
        }

        .product-item {
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            max-width: 100%; /* Kartu akan menyesuaikan lebar layar */
            width: 300px; /* Lebar kartu tetap 300px */
        }

        .product-info {
            background-color: #ffff;
            color: black;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .product-info p {
            margin: 0;
        }

        .menu-name {
            color: black;
        }

        .menu-name p {
            margin: 0;
        }

        .menu-name span {
            color: red;
            font-weight: bold;
        }

        .product-image img {
            width: 300px;
            height: 300px;
            border-radius: 5px;
            order: -1;
        }

        /* Responsive styles for small screens */
        @media (max-width: 768px) {
            .product-card {
                flex-direction: column;
                max-width: 100%; /* Mengembalikan lebar penuh untuk tampilan vertikal */
            }
        }
    </style>
@endpush

@section('content')
    @php
        $user = Auth::user();
    @endphp

    @if ($user)
        @if ($user->role !== 'admin' && !App\Models\DataAkun::where('user_id', $user->id)->exists())
            <p>Silakan isi profile akun anda terlebih dahulu.</p>
            <!-- Tambahkan script SweetAlert untuk menampilkan pesan -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire({
                    title: "Anda Belum Mengisi Data Profile",
                    text: "Silakan isi data Anda untuk melanjutkan",
                    icon: "warning",
                    confirmButtonColor: "#FFCC00",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('dataAkun.create') }}";
                    }
                });
            </script>
        @endif
    @else
        <h1>SELAMAT DATANG</h1>
    @endif <!-- tambahkan tag penutup if -->

    <div class="product-card">
    @forelse ($postingan as $post)
        <a href="{{ route('detailProduct', ['id' => $post->id]) }}" class="product-link">Lihat Detail Produk</a>
            <div class="product-item">
                <div class="product-image">
                    <img src="{{ asset('' . $post->image) }}" alt="Gambar Postingan">
                </div>
                <div class="product-info">
                    <div class="menu-name">
                        <p>{{ $post->nama_menu }}</p>
                        <p><span>Rp {{ $post->harga }}</span></p>
                    </div>
                </div>
            </div>
        </a>
    @empty
        <div class="product-item">
            <h2>Data tidak ada</h2>
        </div>
    @endforelse
</div>

@endsection
