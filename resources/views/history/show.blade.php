@extends('layout.master')

<head>
    <link rel="stylesheet" href="{{ asset('desain/css/struk.css') }}">
</head>
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>

    <div class="invoice-box">
        <table>
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
        <a href="{{ route('history.index') }}" class="btn btn-warning mt-3">Kembali</a>
    </div>
</body>

</html>
@endsection