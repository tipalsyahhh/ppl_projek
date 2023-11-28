@extends('layout.master')

@push('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<style>
    .profile-image {
        width: 100px;
        /* Lebar sesuai kebutuhan Anda */
        height: 50px;
        /* Tinggi sesuai kebutuhan Anda */
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
<<<<<<< HEAD
<a class="btn btn-primary mb-3" href="{{ route('postingan.create') }}"><i class="bi bi-plus"></i> Tambah Data</a>
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
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Jenis</th> <!-- Tambah kolom 'jenis' -->
                    <th scope="col">Kapasitas</th> <!-- Tambah kolom 'kapasitas' -->
                    <th scope="col">Terjual</th>
                    <th scope="col">Images</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($postingan as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->nama_menu }}</td>
                    <td>{{ $post->harga }}</td>
                    <td>{{ $post->deskripsi }}</td>
                    <td>{{ $post->jenis }}</td> <!-- Menampilkan data 'jenis' -->
                    <td>{{ $post->kapasitas }}</td> <!-- Menampilkan data 'kapasitas' -->
                    <td>{{ $jumlahBeli[$post->id] }}</td>
                    <td><img class="profile-image" src="{{ asset('' . $post->image) }}" alt="Gambar Postingan"></td>
                    <td>
                        <div class="button-postingan">
                            <button class="btn btn-warning btn-sm" onclick="window.location='{{ route('postingan.edit', ['id' => $post->id]) }}'">
                                <i class="bi bi-pencil"></i></button>
                            <div class="button-delete-postingan">
                            <form action="{{ route('postingan.destroy', ['id' => $post->id]) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus even ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning btn-sm btn-delete"
                                    data-id="{{ $post->id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                         </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">
                        <h2>Data tidak ada</h2>
                    </td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>
=======
    <a class="btn btn-primary mb-3" href="{{ route('postingan.create') }}"><i class="bi bi-plus"></i> Tambah Data</a>
    @if (session('success'))
        <div id="success-alert" class="alert alert-primary">
            {{ session('success') }}
        </div>
    @endif
    <table class="table" id="dataTable">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Harga</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Jumlah Terjual</th>
                <th scope="col">Images</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($postingan as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->nama_menu }}</td>
                <td>{{ $post->harga }}</td>
                <td>{{ $post->deskripsi }}</td>
                <td>{{ $jumlahBeli[$post->id] }}</td>
                <td><img class="profile-image" src="{{ asset('' . $post->image) }}" alt="Gambar Postingan"></td>
                <td>
                    <a href="{{ route('postingan.edit', ['id' => $post->id]) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                    <form action="{{ route('postingan.destroy', ['id' => $post->id]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary btn-sm btn-delete" data-id="{{ $post->id }}">
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
                        form.action = '/postingan/' + itemId;
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