@extends('layout.master')

@section('judul')
    @if ($user && $user->role === 'admin')
        Daftar Pemesanan
    @else
        Struk Pembayaran
    @endif
@endsection
<style>
    .struk-pembayaran {
        font-family: Arial, sans-serif;
        border: 1px solid #000;
        padding: 20px;
        width: 400px;
        margin: 0 auto;
        background: #fff;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }

    .struk-pembayaran h2 {
        text-align: center;
        margin: 10px 0 20px;
        font-size: 1.5em;
        text-decoration: underline;
    }

    .struk-pembayaran .item {
        padding: 5px 0;
        border-bottom: 1px dashed #000;
    }

    .struk-pembayaran .item:last-child {
        border-bottom: none;
    }

    .struk-pembayaran .nama-menu::before,
    .struk-pembayaran .user::before,
    .struk-pembayaran .alamat::before,
    .struk-pembayaran .jumlah-beli::before {
        content: "";
        display: inline-block;
        width: 80px;
        font-weight: bold;
        padding-right: 10px;
    }

    .struk-pembayaran .nama-menu::before{
        border-bottom: 1px dashed #000;
    }

    .struk-pembayaran .nama-menu::before {
        content: "Tiket: ";
    }

    .struk-pembayaran .user::before {
        content: "User: ";
    }

    .struk-pembayaran .alamat::before {
        content: "Alamat: ";
    }

    .struk-pembayaran .jumlah-beli::before {
        content: "Jumlah Beli: ";
    }
</style>

@section('content')
    <div class="card">
        <div class="card-header">
            @if ($user && $user->role === 'admin')
                Daftar Produk
            @else
                Struk Pembayaran
            @endif
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($user && $user->role === 'admin')
                <table class="table table-striped">
                <a href="{{ route('export') }}" class="btn btn-primary mb-3"><i class="bi bi-printer-fill"></i> Export to Excel</a>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Pesanan</th>
                            <th>User</th>
                            <th>Alamat</th>
                            <th>Jumlah Beli</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->postingan->nama_menu }}</td>
                                <td>{{ $product->login->user }}</td>
                                <td>{{ $product->alamat->alamat }}</td>
                                <td>{{ $product->jumlah_beli }}</td>
                                <td>
                                <button type="button" class="btn btn-primary" onclick="approveOrder({{ $product->id }})">Cek</button>

                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                {{-- Tampilan struk pembayaran --}}
                <h2>Struk Pembayaran</h2>
                <div class="struk-pembayaran">
                    <h2>Struk Pembayaran</h2>
                    @foreach($products as $product)
                    <div class="item">
                        <div class="nama-menu">{{ $product->postingan->nama_menu }}</div>
                        <div class="user">{{ $product->login->user }}</div>
                        <div class="alamat">Alamat: {{ $product->alamat->alamat }}</div>
                        <div class="jumlah-beli">Jumlah Beli: {{ $product->jumlah_beli }}</div>
                    </div>
                    @endforeach
                </div>
            @endif

            <a href="{{ route('pages.welcome') }}" class="btn btn-primary mt-3">Kembali</a>
        </div>
    </div>
    <script>
    // Mengambil notifikasi saat halaman dimuat
    fetchNotifications();

    // Fungsi untuk mengambil notifikasi dengan AJAX
    function fetchNotifications() {
        axios.get('/get-notifications') // Ganti dengan route yang sesuai
            .then(response => {
                const notificationsContainer = document.getElementById('notifications-container');
                notificationsContainer.innerHTML = ''; // Kosongkan elemen notifikasi

                // Loop melalui notifikasi dan tambahkan ke elemen notifikasi
                response.data.forEach(notification => {
                    const notificationItem = document.createElement('div');
                    notificationItem.classList.add('dropdown-item');
                    notificationItem.innerHTML = notification.message; // Sesuaikan dengan struktur notifikasi Anda

                    notificationsContainer.appendChild(notificationItem);
                });
            })
            .catch(error => {
                console.error(error);
            });
    }
</script>

@endsection
