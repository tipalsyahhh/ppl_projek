@extends('layout.master')

@section('judul')
    Profil Pengguna
@endsection

@push('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endpush

@section('content')
    @if ($dataAkun->count() > 0)
    @else
        <a class="btn btn-primary mb-3" href="{{ route('dataAkun.create') }}"><i class="bi bi-person-plus-fill"></i> Tambah Profil Pengguna</a>
    @endif
    @if(session('success'))
        <div id="success-alert" class="alert alert-warning">
            {{ session('success') }}
        </div>
    @endif
    @if(session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Nama Depan</th>
                <th scope="col">Nama Belakang</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Alamat</th>
                <th scope="col">Gender</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dataAkun as $key => $profile)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        @if ($profile->user)
                            {{ $profile->user->user }}
                        @else
                            User Tidak Ditemukan
                        @endif
                    </td>
                    <td>{{ $profile->nama_depan }}</td>
                    <td>{{ $profile->nama_belakang }}</td>
                    <td>{{ $profile->tanggal_lahir }}</td>
                    <td>{{ $profile->alamat }}</td>
                    <td>{{ $profile->gender }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('dataAkun.edit', ['user_id' => $profile->user_id]) }}" class="btn btn-warning btn-sm mr-2"><i class="bi bi-pen-fill"></i></a>
                            <form method="POST" action="{{ route('dataAkun.destroy', ['user_id' => $profile->user_id]) }}" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-warning btn-sm btn-delete" data-id="{{ $profile->user_id }}"><i class="bi bi-trash-fill"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6"><h2>Data tidak ada</h2></td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

@push('script')
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $(document).ready(function() {
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
                        const form = document.querySelector('.delete-form[data-id="' + itemId + '"]');
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
