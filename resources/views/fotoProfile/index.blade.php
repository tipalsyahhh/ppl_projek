@extends('layout.master')

@section('judul')
    Foto Profil Setting
@endsection

@push('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .profile-image {
            width: 100px; /* Lebar sesuai kebutuhan Anda */
            height: 100px; /* Tinggi sesuai kebutuhan Anda */
        }
    </style>
@endpush

@section('content')
@if ($fotoProfiles->isEmpty())
    <a class="btn btn-primary mb-3" href="{{ route('foto-profile.create') }}"><i class="bi bi-person-plus-fill"></i> Tambah Foto Profile</a>
@endif
    @if(session('success'))
        <div id="success-alert" class="alert alert-warning">
            {{ session('success') }}
        </div>
    @endif
    <table class="table" >
        <thead>
            <tr>
                <th scope="col">User</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($fotoProfiles as $key => $fotoProfile)
                <tr>
                    <td>
                        @if ($fotoProfile->user)
                            {{ $fotoProfile->user->user }}
                        @else
                            User Tidak Ditemukan
                        @endif
                    </td>
                    <td>
                        <img class="profile-image" src="{{ asset('storage/' . $fotoProfile->image_path) }}" alt="Profile Image">
                    </td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('foto-profile.edit', ['user_id' => $fotoProfile->user_id]) }}" class="btn btn-warning btn-sm mr-2"><i class="bi bi-pen-fill"></i></a>
                            <form method="POST" action="{{ route('foto-profile.destroy', ['foto_profile' => $fotoProfile->user_id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning btn-sm btn-delete" data-id="{{ $fotoProfile->user_id }}"><i class="bi bi-trash-fill"></i></button>
                            </form>
                        </div>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="4"><h2>Data tidak ada</h2></td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@push('script')
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
            $(document).ready(function() {
                $('#example1').DataTable();

                const deleteButtons = document.querySelectorAll('.btn-delete');
                deleteButtons.forEach(button => {
                    button.addEventListener('click', function(event) {
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
@endpush
