<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Tambahkan Font Awesome -->
    <link rel="stylesheet" href="{{ asset('desain/css/galery.css')}}">
    <title>Gallery</title>
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
<<<<<<< HEAD
                <li><a href="{{ route('login') }}">Login</a></li>   
=======
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><img src="{{ asset('img/logo2.png') }}" alt=""></li>        
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
            </ul>
        </nav>
    </header>
    <div class="container">

        <div class="slide">
    
            
            <div class="item" style="background-image: url('{{ asset('img/el1.jpg') }}');">
                <div class="content">
                    <div class="name">Switzerland</div>
                    <div class="des">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab, eum!</div>
                    <button>See More</button>
                </div>
            </div>
            <div class="item" style="background-image: url('{{ asset('img/el2.jpg') }}');">
                <div class="content">
                    <div class="name">Finland</div>
                    <div class="des">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab, eum!</div>
                    <button>See More</button>
                </div>
            </div>
            <div class="item" style="background-image: url('{{ asset('img/el3.jpg') }}');">
                <div class="content">
                    <div class="name">Iceland</div>
                    <div class="des">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab, eum!</div>
                    <button>See More</button>
                </div>
            </div>
            <div class="item" style="background-image: url('{{ asset('img/el4.jpg') }}');">
                <div class="content">
                    <div class="name">Australia</div>
                    <div class="des">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab, eum!</div>
                    <button>See More</button>
                </div>
            </div>
            <div class="item" style="background-image: url('{{ asset('img/el5.jpg') }}');">
                <div class="content">
                    <div class="name">Netherland</div>
                    <div class="des">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab, eum!</div>
                    <button>See More</button>
                </div>
            </div>
            <div class="item" style="background-image: url('{{ asset('img/el6.jpg') }}');">
                <div class="content">
                    <div class="name">sapi</div>
                    <div class="des">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab, eum!</div>
                    <button>See More</button>
                </div>
            </div>
    
        </div>
    
        <div class="button">
            <button class="prev"><i class="fa-solid fa-arrow-left"></i></button>
            <button class="next"><i class="fa-solid fa-arrow-right"></i></button>
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
</body>
<script src="{{ asset('desain/js/script.js') }}"></script>
</html>