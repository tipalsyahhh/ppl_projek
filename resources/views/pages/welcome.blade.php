@extends('layout.master')

@php
    use Illuminate\Support\Facades\Auth;
@endphp

@section('judul')
    welcome
@endsection

@section('tabel')
    Pilih Destinasi Wisata anda
@endsection

@push('style')
    <!-- Tambahkan style SweetAlert jika belum ditambahkan -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('desain/css/welcome.css') }}">
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

    <div id="noResultsMessage" style="display: none; color: black; font-weight: bold;">
        Pencarian tidak ditemukan
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @forelse ($postingan as $post)
                <div class="modal-content product-item">
                    <div class="modal-body">
                        <img src="{{ asset('' . $post->image) }}" class="profile-image" data-toggle="modal"
                             data-target="#profile-modal" alt="Profile Image">
                        <div class="caption menu-name">
                            <p>{{ $post->nama_menu }}</p>
                        </div>
                        <div class="produk-isi">
                            <p><i class="fas fa-user"></i> Kapasitas: {{ $post->kapasitas }}</p>
                            <p><i class="fas fa-tags ml-2"></i> Category: {{ $post->jenis }}</p>
                        </div>
                        <p class="harga-masuk"><span>Rp {{ $post->harga }}</span></p>
                        <div class="button-user-like-comen">
                            <a href="{{ route('detailProduct', ['id' => $post->id]) }}"
                               class="btn btn-warning btn-sm"><i class="far fa-eye"></i></a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="modal-content product-item">
                    <h2>Data tidak ada</h2>
                </div>
            @endforelse
            <div class="modal fade" id="profile-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <img src="" alt="Profile Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const searchMenuInput = document.getElementById('searchMenu');
        const noResultsMessage = document.getElementById('noResultsMessage');
        searchMenuInput.addEventListener('input', function () {
            const keyword = searchMenuInput.value.toLowerCase();
            const productItems = document.querySelectorAll('.product-item');
            let resultsFound = false;
            productItems.forEach(function (item) {
                const menuName = item.querySelector('.menu-name p').textContent.toLowerCase();
                if (menuName.includes(keyword)) {
                    item.style.display = 'block';
                    resultsFound = true;
                } else {
                    item.style.display = 'none';
                }
            });
            if (!resultsFound) {
                noResultsMessage.style.display = 'block';
            } else {
                noResultsMessage.style.display = 'none';
            }
        });

        // Handle click event for profile images to open the modal
        const profileImages = document.querySelectorAll('.profile-image');
        profileImages.forEach(image => {
            image.addEventListener('click', function () {
                const imgSrc = image.getAttribute('src');
                $('#profile-modal img').attr('src', imgSrc);
            });
        });
    </script>
@endsection
