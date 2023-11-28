@extends('layout.master')

<head>
    <link rel="stylesheet" href="{{ asset('desain/css/struk.css') }}">
</head>

@section('content')
<div class="card">
    <div class="card-header">
        @if ($user && $user->role === 'admin')
        Daftar Pemesanan
        @else
        Struk Pembayaran
        @endif
    </div>
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-primary">
            {{ session('success') }}
        </div>
        @endif

        @if ($user && $user->role === 'admin')
        <div class="table-responsive">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <a href="{{ route('export') }}" class="btn btn-primary mb-3"><i class="bi bi-printer-fill"></i> Export
                    to
                    Excel</a>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Pesanan</th>
                        <th>User</th>
                        <th>Alamat</th>
                        <th>Jumlah Beli</th>
                        <th>Total Harga</th>
                        <th>Waktu Pemesanan</th>
                        <th>Kedatangan</th>
                        <th>Status</th>
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
                        <td>{{ $product->total_harga }}</td>
                        <td>{{ $product->created_at }}</td>
                        <td>{{ $product->tanggal_datang }}</td>
                        <td>{{ $product->status }}</td>
                        <td>
                            <form method="POST" action="{{ route('approve.order') }}" style="display: inline-block;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-primary">Setujui</button>
                            </form>

                            <form action="{{ route('products.rejectOrder') }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-primary">Tolak</button>
                            </form>

                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        {{-- Tampilan struk pembayaran --}}
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            <!-- Invoice styling -->
        </head>

        <body>

            <div class="invoice-box">
                <table>
                    @foreach($products as $product)
                    <tr class="top">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <td class="title">
                                        <img src="{{ asset('img/kedu.png') }}" alt="Company logo"
                                            style="width: 100%; max-width: 300px" />
                                    </td>

                                    <td>
                                        user {{ $product->login->user }}<br />
                                        tanggal pemesan {{ $product->created_at }}<br />
                                        waktu kedatangan {{ $product->tanggal_datang }}<br />
                                        status {{ $product->status }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr class="information">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <td>
                                        Desa Sinar Laut,<br />
                                        Kecamatan Kalianda,<br />
                                        Kabupaten Lampung Selatan,
                                    </td>

                                    <td>
                                        Kedu Warna<br />
                                        Admin<br />
                                        Telp : 082127362
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr class="heading">
                        <td>Pembayaran</td>

                        <td>Check #</td>
                    </tr>

                    <tr class="details">
                        <td>Kasir Kedu Warna</td>

                        <td>RP {{ $product->total_harga }}</td>
                    </tr>

                    <tr class="heading">
                        <td>Item</td>

                        <td>Harga</td>
                    </tr>

                    <tr class="item">
                        <td>{{ $product->postingan->nama_menu }}</td>

                        <td>Rp. {{ $product->postingan->harga }}</td>
                    </tr>

                    <tr class="item">
                        <td>Alamat Pengguna</td>

                        <td>{{ $product->alamat->alamat }}</td>
                    </tr>

                    <tr class="item last">
                        <td>Jumlah Pemesanan</td>

                        <td>{{ $product->jumlah_beli }}</td>
                    </tr>

                    <tr class="total">
                        <td></td>

                        <td>Total: Rp. {{ $product->total_harga }}</td>
                    </tr>
                </table>
                <a href="{{ route('products.tata_tertib') }}" class="btn btn-warning mt-3">Lihat peraturan</a>
                <a href="{{ route('pages.welcome') }}" class="btn btn-warning mt-3">Kembali</a>
                @endforeach
            </div>
        </body>

        </html>
        @endif
    </div>
</div>
@endsection