@php
    use Illuminate\Support\Facades\Auth;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("{{ asset('img/bacground1.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            color: #333;
            font-size: 36px;
            margin-bottom: 20px;
        }

        a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s;
        }

        a:hover {
            color: #0056b3;
        }

        .container {
            background-color: #048dcc65;
            border-radius: 10px;
            box-shadow: 0px 6px 8px black;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    @if (Auth::check())
        <h1>Selamat Datang di Halaman Home</h1>
        <p>Next, <a href="{{ route('pages.welcome') }}">klik di sini</a> untuk melanjutkan.</p>
    @else
        <p>Silakan <a href="{{ route('login') }}">masuk</a> terlebih dahulu untuk mengakses halaman ini.</p>
    @endif
</div>

</body>
</html>
