@extends('layout.master')
<link rel="stylesheet" href="{{ asset('desain/css/histori.css')}}">

@section('content')
    <div class="container-history">
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="cart-histori">
            <div class="header-history">
                <h1>History Pembayaran</h1>
            </div>
            <div class="isi-histori">
                @php
                $products = $products->reverse(); // Membalik urutan data
                @endphp

                @foreach($products as $product)
                @if($product->user_id == $user->id)
                <div class="text-histori" onclick="redirectToHistory('{{ route('history.show', $product->id) }}')">
                    <p class="text-menu">{{ $product->postingan->nama_menu }}</p>
                    <p>{{ $product->created_at }}</p>
                </div>
                @endif
                @endforeach
            </div>
        </div>
            <script>
                function redirectToHistory(route) {
                    window.location.href = route;
                }
            </script>
    </div>
@endsection