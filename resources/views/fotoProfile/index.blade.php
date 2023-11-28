@extends('layout.master')

@push('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<style>
    .foto-frofile-akun {
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .profile-image {
        border-radius: 50%;
        width: 200px;
        height: 200px;
        cursor: pointer;
        object-fit: cover;
        margin-right: 10px;
    }

    #profile-modal img {
        max-width: 100%;
        max-height: 100%;
    }

    .button-pp {
        position: absolute;
        bottom: 0;
        margin-left: 80px;
    }
</style>
@endpush

@section('content')
<center>
    <h3 style="color: black;">Foto profile setting</h3>
</center>
@if(session('success'))
<div id="success-alert" class="alert alert-warning">
    {{ session('success') }}
</div>
@endif
@forelse ($fotoProfiles as $key => $fotoProfile)
<div class="foto-frofile-akun">
    <img class="profile-image" src="{{ asset('storage/' . $fotoProfile->image_path) }}" alt="Profile Image"
        data-toggle="modal" data-target="#profile-modal">
    <div class="button-pp">
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
            <i class="bi bi-gear-fill"></i>
        </button>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <!-- Tambahkan tautan atau formulir yang diinginkan -->
                <a href="{{ route('foto-profile.edit', ['user_id' => $fotoProfile->user_id]) }}"
                    class="btn btn-warning btn-sm"><i class="bi bi-pen-fill"></i> Ubah Foto</a>
                <!-- Garis pemisah di atas tombol hapus -->
                <hr class="my-2">
                <form method="POST"
                    action="{{ route('foto-profile.destroy', ['foto_profile' => $fotoProfile->user_id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-warning btn-sm btn-delete"
                        data-id="{{ $fotoProfile->user_id }}"><i class="bi bi-trash-fill"></i> Hapus</button>
                </form>
                <!-- Garis pemisah di bawah tombol hapus -->
                <hr class="my-2">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@empty
<div class="foto-frofile-akun">
    <img class="profile-image" src="{{ asset('storage/default_profile.png') }}" alt="Profile Image" data-toggle="modal"
        data-target="#profile-modal">
        <div class="button-pp">
            @if ($fotoProfiles->isEmpty())
            <a class="btn btn-warning" href="{{ route('foto-profile.create') }}"><i class="bi bi-person-plus-fill"></i></a>
            @endif
        </div>
</div>
@endforelse

<!-- Modal untuk tampilan foto profil yang diperbesar -->
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
@endsection

@push('script')
<script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $('#example1').DataTable();

        const deleteButtons = document.querySelectorAll('.btn-delete');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                const itemId = button.getAttribute('data-id');
                Swal.fire({
                    title: "Konfirmasi",
                    text: "Apakah Anda ingin menghapus data ini?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#FFCC00",
                    cancelButtonColor: "#FFCC00",
                    confirmButtonText: "Ya, Hapus",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        const form = document.createElement('form');
                        form.method = 'POST';
                        form.action = '/foto-profile/' + itemId; // Sesuaikan endpoint dengan yang sesuai
                        form.style.display = 'none';
                        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                        const csrfInput = document.createElement('input');
                        csrfInput.name = '_token';
                        csrfInput.value = csrfToken;
                        form.appendChild(csrfInput);
                        const methodInput = document.createElement('input');
                        methodInput.name = '_method';
                        methodInput.value = 'DELETE';
                        form.appendChild(methodInput);
                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            });
        });

        // Handle click event for profile images to open the modal
        const profileImages = document.querySelectorAll('.profile-image');
        profileImages.forEach(image => {
            image.addEventListener('click', function () {
                const imgSrc = image.getAttribute('src');
                $('#profile-modal img').attr('src', imgSrc);
            });
        });
    });
</script>

<script>
    // Ambil elemen pesan flash session
    const successAlert = document.getElementById('success-alert');

    // Cek apakah elemen pesan ada
    if (successAlert) {
        // Setelah 10 detik, sembunyikan elemen pesan
        setTimeout(function () {
            successAlert.style.display = 'none';
        }, 10000); // 10 detik
    }
</script>
@endpush