@extends('layout.master')

@push('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .profile-image {
            width: 100px;
            height: 50px;
        }

        .button-postingan {
            display: flex;
            margin-right: 10px;
        }

        .button-delete-postingan {
            margin-left: 10px;
        }
    </style>
@endpush

@section('content')
<a class="btn btn-primary mb-3" href="{{ route('even.create') }}"i class="bi bi-plus"></i> Tambah Status</a>

@if (session('success'))
    <div id="success-alert" class="alert alert-primary">
        {{ session('success') }}
    </div>
@endif

<div class="card-body">
    <div class="table-responsive">
        <table class="table" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nama Even</th>
                    <th>Tanggal Acara</th>
                    <th>Deskripsi</th>
                    <th>Harga Tiket</th>
                    <th>Status Even</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($evens as $event)
                <tr>
                    <td>{{ $event->nama_even }}</td>
                    <td>{{ $event->tanggal_acara }}</td>
                    <td>{{ $event->deskripsi }}</td>
                    <td>{{ $event->harga_tiket }}</td>
                    <td>{{ $event->status_even }}</td>
                    <td>
                        <div class="button-postingan">
                            <button class="btn btn-warning btn-sm"
                                onclick="window.location='{{ route('even.edit', $event->id) }}'">
                                Edit
                            </button>
                            <div class="button-delete-postingan">
                            <form action="{{ route('even.destroy', $event->id) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus even ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning btn-sm" data-id="{{ $event->id }}"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('script')
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();

            const deleteButtons = document.querySelectorAll('.button-delete-postingan button');
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
                            form.action = '/even/' + itemId;
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
            setTimeout(function () {
                successAlert.style.display = 'none';
            }, 10000); // 10 detik
        }
    </script>
@endpush