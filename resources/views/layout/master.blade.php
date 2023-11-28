<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Projek Perangkat Lunak</title>

    <!-- Custom fonts for this template -->
    <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('admin/css/sb-admin-2.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('desain/css/fouter.css')}}">

    <!-- Custom styles for this page -->
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->

    <!-- Sidebar -->

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->

    <!-- Main Content -->

<<<<<<< HEAD
    <!-- Topbar -->
    @include('partial.nav')
    <!-- End of Topbar -->
=======
<<<<<<< HEAD
    <!-- Topbar -->
    @include('partial.nav')
    <!-- End of Topbar -->
=======
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">@yield('judul')</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">@yield('tabel')</h6>
                        </div>
                        <div class="card-body">
                            @yield('content')
                        </div>
                        <div class="card-footer">
                            Footer
                        </div>
                    </div>
                </div>
            <!-- End of Main Content -->
>>>>>>> 6b3ee88ae04a4dd741cc8fe068843f3c9ab397a7
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49

    <!-- Begin Page Content -->
    @if ($user && $user->role === 'admin')
    <div class="user-admin">
        <!-- Admin Section -->
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder" style="color: white; font-size: 1.2em;"></i>
        </a>

        <div id="collapsePages" class="dropdown-menu dropdown-menu-center shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">&nbsp;&nbsp;Crud Tabel :</h6>
                <a class="dropdown-item" href="{{ route('postingan.index') }}" class="nav-link">Uploat</a>
                <a class="dropdown-item" href="{{ route('products.index') }}" class="nav-link">Pesanan</a>
                <a class="dropdown-item" href="{{ route('statuses.index') }}" class="nav-link">Status</a>
                <a class="dropdown-item" href="{{ route('even.index') }}" class="nav-link">Even</a>
            </div>
        </div>
<<<<<<< HEAD
    </div>
    @endif
    <!-- Page Heading -->
    <h1 class="h3 mt-2 text-gray-800">@yield('judul')</h1>
    <h6 class="m-0 font-weight-bold text-primary">@yield('tabel')</h6>
    <div class="card-body" style="padding-bottom: 4rem; padding-top: 5rem;">
        @yield('content')
    </div>
    <div class="fouter-user">
        <footer>
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <div class="isi-menu">
                        <!-- Divider -->

                        <!-- Nav Items -->
                        <a class="isi-icon" href="{{ route('like.status') }}">
                            <i class="bi bi-house-door" style="color: black; font-size: 1.2em;"></i>
                        </a>
                        <a class="isi-icon" href="{{ route('pages.welcome') }}">
                            <i class="bi bi-shop-window" style="color: black; font-size: 1.2em;"></i>
                        </a>
                        <a class="isi-icon" href="{{ route('statuses.create') }}">
                            <i class="bi bi-plus-square" style="color: black; font-size: 1.2em;"></i>
                        </a>
                        <a class="isi-icon" href="{{ route('follow.index') }}">
                            <i class="bi bi-people-fill" style="color: black; font-size: 1.2em;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
=======
    </div>
    @endif
    <!-- Page Heading -->
    <h1 class="h3 mt-2 text-gray-800">@yield('judul')</h1>
    <h6 class="m-0 font-weight-bold text-primary">@yield('tabel')</h6>
    <div class="card-body" style="padding-bottom: 4rem; padding-top: 5rem;">
        @yield('content')
    </div>
    <div class="fouter-user">
        <footer>
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <div class="isi-menu">
                        <!-- Divider -->

                        <!-- Nav Items -->
                        <a class="isi-icon" href="{{ route('like.status') }}">
                            <i class="bi bi-house-door" style="color: black; font-size: 1.2em;"></i>
                        </a>
                        <a class="isi-icon" href="{{ route('pages.welcome') }}">
                            <i class="bi bi-shop-window" style="color: black; font-size: 1.2em;"></i>
                        </a>
                        <a class="isi-icon" href="{{ route('statuses.create') }}">
                            <i class="bi bi-plus-square" style="color: black; font-size: 1.2em;"></i>
                        </a>
                        <a class="isi-icon" href="{{ route('follow.index') }}">
                            <i class="bi bi-people-fill" style="color: black; font-size: 1.2em;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
>>>>>>> 5a5607c74fac3e2d437f904cadc8ba94bce64f49
    <!-- End of Main Content -->
    <!-- End of Footer -->
    <!-- End of Content Wrapper -->



    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>


    @stack('script')
    @stack('style')
</body>

</html>