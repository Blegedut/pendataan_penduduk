<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="stylesheet" href={{ asset('assets/css/main/app.css') }}>
    <link rel="stylesheet" href={{ asset('assets/css/main/app-dark.css') }}>
    <link rel="shortcut icon" href={{ asset('assets/images/logo/favicon.svg') }} type="image/x-icon">
    <link rel="shortcut icon" href={{ asset('assets/images/logo/favicon.png') }} type="image/png">

    <link rel="stylesheet" href={{ asset('assets/css/shared/iconly.css') }}>
    <link rel="stylesheet" href={{ asset('assets/css/pages/simple-datatables.css') }}>
    <link rel="stylesheet" href={{ asset('assets/css/pages/fontawesome.css') }}>


</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <h1>Pendataan Penduduk</h1>
                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                    class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        @hasrole('superadmin')
                            <li class="sidebar-title">Dashboard</li>

                            <li class="sidebar-item {{ request()->is('dashboard*') ? 'active' : '' }} ">
                                <a href="/dashboard" class='sidebar-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                        @endhasrole

                        <li class="sidebar-title">Menu</li>

                        @hasrole('superadmin')
                            <li class="sidebar-item {{ request()->is('rw*') ? 'active' : '' }}">
                                <a href={{ url('/rw') }} class='sidebar-link'>
                                    <i class="fas fa-user"></i>
                                    <span>Data RW</span>
                                </a>
                            </li>
                        @endhasrole

                        @hasrole('superadmin|rw')
                            <li class="sidebar-item {{ request()->is('rt*') ? 'active' : '' }}">
                                <a href={{ url('/rt') }} class='sidebar-link'>
                                    <i class="fas fa-user-friends"></i>
                                    <span>Data RT</span>
                                </a>
                            </li>
                        @endhasrole

                        @hasrole('superadmin|rw|rt|warga')
                            <li class="sidebar-item {{ request()->is('kk*') ? 'active' : '' }}">
                                <a href={{ url('/kk') }} class='sidebar-link'>
                                    <i class="fas fa-address-card"></i>
                                    <span>Data Kartu Keluarga</span>
                                </a>
                            </li>
                        @endhasrole

                        @hasrole('superadmin|rw|rt')
                            <li class="sidebar-item {{ request()->is('penduduk*') ? 'active' : '' }}">
                                <a href={{ url('/penduduk') }} class='sidebar-link'>
                                    <i class="fas fa-users"></i>
                                    <span>Data Penduduk</span>
                                </a>
                            </li>
                        @endhasrole
                        <li class="sidebar-title">Setting</li>
                        <li class="sidebar-item ">
                            {{-- <a href={{ url('/penduduk') }} class='sidebar-link'> --}}
                            <a class="sidebar-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out-alt "></i>
                                <span>Logout</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            @yield('master')

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @include('sweetalert::alert')
    <script src={{ asset('assets/js/app.js') }}></script>
    <script src={{ asset('assets/js/pages/dashboard.js') }}></script>
    <script src={{ asset('assets/js/extensions/simple-datatables.js') }}></script>


</body>

</html>
