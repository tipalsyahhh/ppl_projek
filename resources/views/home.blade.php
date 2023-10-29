<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Tambahkan Font Awesome -->
    <title>Halaman Home</title>
    <link rel="stylesheet" href="{{ asset('desain/css/home.css')}}">
    <style>
        .image {
            background-image: url("{{ asset('img/bacground2.jpeg') }}");
            background-size: cover;
            height : 77vh;
        }
    </style>
</head>
<body>
    <header>
        <div class="name">
            <div class="firstname">Grand</div>
            <div class="lastname">Elty</div>
        </div>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('from_input') }}">Gallery</a></li>
                <li><a href="{{ route('register') }}">Daftar</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><img src="{{ asset('img/logo2.png') }}" alt=""></li>        
            </ul>
           
        </nav>
    </header>
    <div class="image">
        <h1>welcome</h1>
        <p>Grand Elty Krakatoa menawarkan sebuah akomodasi bintang 4 di daerah selatan Lampung. <br>
            Memiliki pemandangan Selat Sunda yang indah, resor ini membanggakan kolam renang outdoor dan sejumlah aktivitas rekreasi yang dimilikinya.</p>
    </div>
    <div class="container">
        <div class="box">
            <span><h1>Grand Elty Kratao</h1></span>
            <p>Grand Elty Krakatoa Lampung adalah hotel di lokasi yang baik, tepatnya berada di Kalianda.
            Dari Dermaga Bom, hotel ini hanya berjarak sekitar 9,91 km.</p>

            <p>Selain letaknya yang strategis, Grand Elty Krakatoa Lampung
            juga merupakan hotel dekat Bambu Kuning Trade Center (BTC) berjarak
            sekitar 42,81 km dan Kantor Kesehatan Pelabuhan Kelas II Panjang berjarak sekitar 47,61 km..</p>

            <p>Tentang Grand Elty Krakatoa Lampung
            Menginap di Grand Elty Krakatoa Lampung tak hanya memberikan kemudahan untuk mengeksplorasi
            destinasi petualangan Anda, tapi juga menawarkan kenyamanan bagi istirahat Anda.</p>

            <p>hotel ini adalah pilihan tepat bagi Anda dan pasangan yang ingin menikmati liburan romantis.
            Dapatkan pengalaman yang penuh kesan bersama pasangan dengan menginap di Grand Elty Krakatoa Lampung.</p>

            <p>Grand Elty Krakatoa Lampung adalah tempat bermalam yang tepat bagi Anda yang berlibur bersama keluarga.
            Nikmati segala fasilitas hiburan untuk Anda dan keluarga.
            hotel ini adalah pilihan yang pas jika Anda mencari liburan yang tenang dan jauh dari keramaian.</p>

            <p>Pengalaman menginap Anda tak akan terlupakan berkat pelayanan istimewa yang disertai oleh berbagai fasilitas pendukung untuk kenyamanan Anda.
            Tersedia kolam renang untuk Anda bersantai sendiri maupun bersama teman dan keluarga.
            Resepsionis siap 24 jam untuk melayani proses check-in, check-out dan kebutuhan Anda
            yang lain. Jangan ragu untuk menghubungi resepsionis, kami siap melayani Anda.</p>

            <p>Terdapat restoran yang menyajikan menu lezat ala Grand Elty Krakatoa Lampung khusus untuk Anda.
            Grand Elty Krakatoa Lampung adalah akomodasi dengan fasilitas baik dan kualitas pelayanan memuaskan menurut sebagian besar tamu.
            Pengalaman berkesan dan tak terlupakan akan Anda dapatkan selama menginap di Grand Elty Krakatoa Lampung.</p>
        </div>
    </div>
    <footer>
        <div class="footer-content">
            <h3>pantai elfy</h3>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Delectus ex recusandae fugiat alias pariatur sunt, atque laboriosam. Quia eius nulla saepe vitae sapiente veritatis sequi! Nisi distinctio facere laudantium illo!
            </p>
            <ul class="socials">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
            </ul>
        </div>

        <div class="footer-bottom">
            <p>copyright &copy;2020 grandelty. designed by <span>adityas</span></p>
        </div>
    </footer>

   
    <script>
        var header = document.querySelector("header");
        var image = document.querySelector(".image");

        window.onscroll = function() {
            if (window.scrollY > image.clientHeight - header.clientHeight) {
                header.style.backgroundColor = "#42414179";
            } else {
                header.style.backgroundColor = "transparent";
            }
        };
    </script>
</body>
</html>