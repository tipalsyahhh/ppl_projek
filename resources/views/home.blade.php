<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('desain/css/home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>
    <nav>
        <div class="layar-dalam">
            <div class="menu">
                <a href="#" class="tombol-menu">
                    <span class="garis"></span>
                    <span class="garis"></span>
                    <span class="garis"></span>
                </a>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('from_input') }}">Gallery</a></li>
                    <li><a href="{{ route('register') }}">Daftar</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="layar-penuh">
        <header id="home">
            <div class="overlay"></div>
            <video autoplay muted loop>
                <source src="{{ asset('img/vidio.mp4') }}" type="video/mp4" />
            </video>
            <div class="intro">
                <div class="elty">
                    <h3>Kedu Warna</h3>
                </div></br>
                <p>
                    Menyentuh surga, resort impian terwujud.
                </p>
            </div>
        </header>
        <main>
            <section id="aboutus">
                <div class="layar-dalam">
                    <h3>Grand Elty</h3>
                    <p class="ringkasan">Grand Elty Krakatoa Lampung adalah hotel di lokasi yang baik, tepatnya berada
                        di Kalianda.
                        Dari Dermaga Bom, hotel ini hanya berjarak sekitar 9,91 km.</p>

                    <p class="ringkasan">Selain letaknya yang strategis, Grand Elty Krakatoa Lampung
                        juga merupakan hotel dekat Bambu Kuning Trade Center (BTC) berjarak
                        sekitar 42,81 km dan Kantor Kesehatan Pelabuhan Kelas II Panjang berjarak sekitar 47,61 km..</p>

                    <p class="ringkasan">Tentang Grand Elty Krakatoa Lampung
                        Menginap di Grand Elty Krakatoa Lampung tak hanya memberikan kemudahan untuk mengeksplorasi
                        destinasi petualangan Anda, tapi juga menawarkan kenyamanan bagi istirahat Anda.</p>

                    <p class="ringkasan">hotel ini adalah pilihan tepat bagi Anda dan pasangan yang ingin menikmati
                        liburan romantis.
                        Dapatkan pengalaman yang penuh kesan bersama pasangan dengan menginap di Grand Elty Krakatoa
                        Lampung.</p>

                    <p class="ringkasan">Grand Elty Krakatoa Lampung adalah tempat bermalam yang tepat bagi Anda yang
                        berlibur bersama keluarga.
                        Nikmati segala fasilitas hiburan untuk Anda dan keluarga.
                        hotel ini adalah pilihan yang pas jika Anda mencari liburan yang tenang dan jauh dari keramaian.
                    </p>

                    <p class="ringkasan">Pengalaman menginap Anda tak akan terlupakan berkat pelayanan istimewa yang
                        disertai oleh berbagai fasilitas pendukung untuk kenyamanan Anda.
                        Tersedia kolam renang untuk Anda bersantai sendiri maupun bersama teman dan keluarga.
                        Resepsionis siap 24 jam untuk melayani proses check-in, check-out dan kebutuhan Anda
                        yang lain. Jangan ragu untuk menghubungi resepsionis, kami siap melayani Anda.</p>

                    <p class="ringkasan">Terdapat restoran yang menyajikan menu lezat ala Grand Elty Krakatoa Lampung
                        khusus untuk Anda.
                        Grand Elty Krakatoa Lampung adalah akomodasi dengan fasilitas baik dan kualitas pelayanan
                        memuaskan menurut sebagian besar tamu.
                        Pengalaman berkesan dan tak terlupakan akan Anda dapatkan selama menginap di Grand Elty Krakatoa
                        Lampung.</p>
                </div>
            </section>
            <section class="abuabu" id="support">
                <center>
                    <div class="layar-dalam support">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.2723142732743!2d105.53066967590067!3d-5.673715356162773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e411a6fd16caaf9%3A0x1cfbe772777de4da!2sGrand%20Elty%20Krakatoa%20Resort!5e0!3m2!1sid!2sid!4v1699004792573!5m2!1sid!2sid"
                            width="80%" height="350" style="border:0; margin:auto" scrolling="yes"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </center>
            </section>
            <section id="gallery">
                <div><img src="{{ asset('img/1.webp') }}" onclick="openModal('{{ asset('img/1.webp') }}')" /></div>
                <div><img src="{{ asset('img/el1.jpg') }}" onclick="openModal('{{ asset('img/el1.jpg') }}')" /></div>
                <div><img src="{{ asset('img/el2.jpg') }}" onclick="openModal('{{ asset('img/el2.jpg') }}')" /></div>
                <div><img src="{{ asset('img/el3.jpg') }}" onclick="openModal('{{ asset('img/el3.jpg') }}')" /></div>
                <div><img src="{{ asset('img/el4.jpg') }}" onclick="openModal('{{ asset('img/el4.jpg') }}')" /></div>
                <div><img src="{{ asset('img/el5.jpg') }}" onclick="openModal('{{ asset('img/el5.jpg') }}')" /></div>
                <div><img src="{{ asset('img/bacground1.jpeg') }}"
                        onclick="openModal('{{ asset('img/bacground1.jpeg') }}')" /></div>
                <div><img src="{{ asset('img/el6.jpg') }}" onclick="openModal('{{ asset('img/el6.jpg') }}')" /></div>
            </section>
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <img id="modalImage" style="width:100%">
                </div>
            </div>
            <section class="quote">
                <div class="layar-dalam">
                    <p>Greand Elty terbuat dari rindu, tentang kita dan keluarga.</p>
                </div>
            </section>
            <section class="abuabu" id="blog">
                <div class="layar-dalam">
                    <h3>Lastest Blog</h3>
                    <p class="ringkasan">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi,
                        fugit.
                    </p>
                    <div class="blog">
                        <div class="area">
                            <div class="gambar" style="background-image: url('asset/blog1.jpg')"></div>
                            <div class="text">
                                <article>
                                    <h4><a href="#">What About Bromo?</a></h4>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Placeat, est omnis? Quas reprehenderit rem nesciunt.
                                    </p>
                                </article>
                            </div>
                        </div>
                        <div class="area">
                            <div class="gambar" style="background-image: url('asset/blog2.jpg')"></div>
                            <div class="text">
                                <article>
                                    <h4><a href="#">What About Yogyakarta?</a></h4>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Placeat, est omnis? Quas reprehenderit rem nesciunt.
                                    </p>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer id="contact">
            <div class="layar-dalam">
                <a href="https://www.facebook.com/akun-facebook-anda" target="_blank">
                    <i class="fab fa-facebook" style="color: #acaaaa; font-size: 1.5em;"></i>
                </a>
                <a href="https://www.twitter.com/akun-twitter-anda" target="_blank">
                    <i class="fab fa-youtube " style="color: #acaaaa; font-size: 1.5em;"></i>
                </a>
                <a href="https://www.instagram.com/elty_krakatoa/" target="_blank">
                    <i class="fab fa-instagram" style="color: #acaaaa; font-size: 1.5em;"></i>
                </a>
                <a href="https://www.tiktok.com/@grandelty" target="_blank">
                    <i class="fab fa-tiktok" style="color: #acaaaa; font-size: 1.5em;"></i>
                </a>
            </div>
            <div class="layar-dalam">
                <div class="copyright">&copy; 2023 Proyek Perangkat Lunak</div>
            </div>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('desain/js/javascript.js') }}"></script>
</body>

</html>
