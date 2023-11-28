<!-- Stylesheet Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow fixed-top" style="background-color: #52b3d9">
    <!-- Sidebar Toggle (Topbar) -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('like.status') }}">
        <div class="sidebar-brand-text text-white ml-1" style="font-weight: bold;">
            {{ $user->namadepan }} {{ $user->namabelakang }}
        </div>
    </a>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto" id="accordionSidebar">
        <!-- Divider -->

        <!-- Nav Items -->
        <li id="nav-like" class="nav-item active">
            <a class="nav-link" href="{{ route('like.status') }}">
                <i class="bi bi-house-door" style="color: white; font-size: 1.4em;"></i>
            </a>
        </li>
        <li id="nav-welcome" class="nav-item active">
            <a class="nav-link" href="{{ route('pages.welcome') }}">
                <i class="bi bi-shop-window" style="color: white; font-size: 1.4em;"></i>
            </a>
        </li>
        <li id="nav-status" class="nav-item active">
            <a class="nav-link" href="{{ route('statuses.create') }}">
                <i class="bi bi-plus-square" style="color: white; font-size: 1.4em;"></i>
            </a>
        </li>
        <li id="nav-follow" class="nav-item active">
            <a class="nav-link" href="{{ route('follow.index') }}">
                <i class="bi bi-people-fill" style="color: white; font-size: 1.4em;"></i>
            </a>
        </li>
        <!-- Add more Nav Items as needed -->

        <!-- Messages -->
        <!-- Dalam tampilan Blade Anda -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('even.tampilanEven') }}">
                <i class="bi bi-calendar-event" style="color: white; font-size: 1.4em;"></i>
            </a>
        </li>
        
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw" style="color: white; font-size: 1.2em;"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">
                    {{ auth()->user()->unreadOrdersCount() + auth()->user()->rejectedOrdersCount() +
                    auth()->user()->approvedOrdersCount() }}
                </span>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Message Center
                </h6>

                @foreach($products as $product)
                @if(auth()->user()->id == $product->user_id)
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                    <img src="{{ asset('img/kedu.png') }}" alt="Company logo"
                                    style="width: 100%; max-width: 300px" />
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div class="font-weight-bold">
                        <div class="text-truncate">Status: {{ $product->status }}<br />
                            Pesanan: {{ $product->postingan->nama_menu }}
                        </div>
                        <div class="small text-gray-500">
                            {{ date('d F Y H:i:s', strtotime($product->created_at)) }}
                        </div>
                    </div>
                </a>
                @endif
                @endforeach

                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
            </div>
        </li>

        <li class="nav-item dropdown no-arrow mx-1">
            @if (request()->route()->getName() === 'pages.welcome')
            <!-- Tambahkan tombol dropdown untuk tampilan filter dan form pencarian -->
            <a class="nav-link dropdown-toggle" href="#" id="filterDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="bi bi-search" style="color: white;"></i>
            </a>

            <!-- Dropdown - Filter & Search -->
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="filterDropdown" style="width: 100vw">
                <div class="container" id="filterAndSearch">
                    <div class="row align-items-center flex-column flex-md-row">
                        <div class="col-sm-12 col-md-14">
                            <form class="form-inline ml-2">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" id="searchMenu"
                                        placeholder="Cari Yang Anda Inginkan?" aria-label="Search"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn" style="background-color: #EAE0DA;" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </li>

        <!-- User Information -->
        <div class="topbar-divider d-none d-sm-block"></div>

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline small" style="color: white;">{{ $user->user }}</span>
                <img class="img-profile rounded-circle"
                    src="{{ $user->profileImage ? asset('storage/' . $user->profileImage->image_path) : asset('storage/default_profile.png') }}">
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('dataAkun.index') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="{{ route('reset.password.form.show', ['username']) }}">
                    <i class="bi bi-arrow-clockwise"></i>
                    &nbsp;&nbsp;Reset Password
                </a>
                <a class="dropdown-item" href="{{ route('history.index') }}">
                    <i class="fas fa-history"></i>
                    &nbsp;&nbsp;History
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}">
                    <i class="bi bi-box-arrow-right"></i>
                    &nbsp;&nbsp;Logout
                </a>
            </div>
        </li>
    </ul>
</nav>

<script>
    function stopPropagation(event) {
        event.stopPropagation();
    }
</script>

<!-- End of Topbar -->