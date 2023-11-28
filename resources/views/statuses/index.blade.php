@extends('layout.master')

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
@section('judul')
    Daftar Status
@endsection

@section('tabel')
    Data Status
@endsection

<<<<<<< HEAD
=======
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
@push('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .profile-image {
            width: 100px;
            height: 50px;
        }
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49

        .button-postingan {
            display: flex;
            margin-right: 10px;
        }

        .button-delete-postingan {
            margin-left: 10px;
        }
<<<<<<< HEAD
=======
=======
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
    </style>
@endpush

@section('content')
    <a class="btn btn-primary mb-3" href="{{ route('statuses.create') }}"><i class="bi bi-plus"></i> Tambah Status</a>
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
    @if (session('success'))
        <div id="success-alert" class="alert alert-primary">
            {{ session('success') }}
        </div>
    @endif
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49

    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User</th>
                        <th scope="col">Caption</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($statuses as $status)
                        <tr>
                            <td>{{ $status->id }}</td>
                            <td>
                                @if ($status->user)
                                    {{ $status->user->user }}
                                @else
                                    User Tidak Ditemukan
                                @endif
                            </td>
                            <td>{{ $status->caption }}</td>
                            <td><img class="profile-image" src="{{ asset('' . $status->image) }}"
                                    alt="Status Image"></td>
                            <td>
                                <div class="button-postingan">
<<<<<<< HEAD
                                    <a href="{{ route('statuses.edit', ['status' => $status]) }}"
                                        class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
=======
                                    <button class="btn btn-warning btn-sm" onclick="window.location='{{ route('statuses.edit', ['status' => $status]) }}'">
                                        <i class="bi bi-pencil"></i></button>
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
                                    <div class="button-delete-postingan">
                                    <form method="POST" action="{{ route('statuses.destroy', $status->id) }}"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus status ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-warning btn-sm" data-id="{{ $status->id }}"><i class="bi bi-trash"></i></button>
                                    </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <h2>Data tidak ada</h2>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
<<<<<<< HEAD
=======
=======
    <table class="table" id="dataTable">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">User</th>
                <th scope="col">Caption</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($statuses as $status)
            <tr>
                <td>{{ $status->id }}</td>
                <td>
                    @if ($status->user)
                        {{ $status->user->user }}
                    @else
                        User Tidak Ditemukan
                    @endif
                </td>
                <td>{{ $status->caption }}</td>
                <td><img class="profile-image" src="{{ asset('' . $status->image) }}" alt="Status Image"></td>
                <td>
                    <a href="{{ route('statuses.edit', ['status' => $status]) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                    <form action="{{ route('statuses.destroy', ['status' => $status]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary btn-sm btn-delete" data-id="{{ $status->id }}">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5"><h2>Data tidak ada</h2></td>
            </tr>
        @endforelse
        </tbody>
    </table>
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
@endsection

@push('script')
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
        $(document).ready(function () {
            $('#dataTable').DataTable();

            const deleteButtons = document.querySelectorAll('.button-delete-postingan button');
<<<<<<< HEAD
=======
=======
        $(document).ready(function() {
            $('#dataTable').DataTable();

            const deleteButtons = document.querySelectorAll('.btn-delete');
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
            deleteButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    const itemId = button.getAttribute('data-id');
                    Swal.fire({
                        title: "Konfirmasi",
                        text: "Apakah Anda ingin menghapus data ini?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#5d7eeb",
                        cancelButtonColor: "#5d7eeb",
                        confirmButtonText: "Ya, Hapus",
                        cancelButtonText: "Batal"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const form = document.createElement('form');
                            form.method = 'POST';
                            form.style.display = 'none';
<<<<<<< HEAD
                            form.action = '/statuses/' + itemId;
=======
<<<<<<< HEAD
                            form.action = '/statuses/' + itemId;
=======
                            form.action = form.action = '/statuses/' + itemId;
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
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
<<<<<<< HEAD
            setTimeout(function () {
=======
<<<<<<< HEAD
            setTimeout(function () {
=======
            setTimeout(function() {
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
                successAlert.style.display = 'none';
            }, 10000); // 10 detik
        }
    </script>
@endpush
