<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('js')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('/img/logosss.png') }}" type="image/x-icon">
    @yield('css')
    <style>
        body {
            background-color: #f6f8fb;
        }
        .navbar-brand {
            font-family: poppins-medium;
            letter-spacing: .5px;

        }

        .navbar .nav-item .nav-link {
            font-family: poppins-regular;
            letter-spacing: .3px;

        }

        .card-title, .card-text {
            font-family: poppins-regular; /* Sama dengan navbar */
            letter-spacing: .3px; /* Sama dengan navbar */
        }
        .nav-link {
            color: #929dab; /* Warna link */
            text-decoration: none; /* Menghilangkan garis bawah */
            font-weight: bold; /* Tebal */
        }

        .nav-link:hover {
            color: #0056b3; /* Warna saat hover */
        }
        .nav-link.active {
            position: relative; /* Buat elemen link menjadi relatif agar garis bisa diposisikan */
        }

        .nav-link.active::after {
            content: ''; /* Garis tambahan */
            position: absolute;
            bottom: -12px;
            left: 0;
            width: 100%; /* Lebar garis sepanjang link */
            height: 2px; /* Ketebalan garis */
            background-color: #007bff; /* Warna garis */
        }

        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
        }

    </style>
</head>
<body>
    <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}" >
                E - Pilketos
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="#">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <!-- Gambar profil di depan -->
                                @auth
                                @if (Auth::user()->role == 'admin')
                                <img src="https://avatar.iran.liara.run/username?username={{ urlencode(Auth::user()->username) }}" alt="Profile Image" class="rounded-circle mr-2" style="width: 40px; height: 40px;">
                                @endif
                                @endauth
                                @auth
                                @if (Auth::user()->role == 'siswa')
                                <img src="https://avatar.iran.liara.run/username?username={{ urlencode(Auth::user()->nama_panjang) }}" alt="Profile Image" class="rounded-circle mr-2" style="width: 40px; height: 40px;">
                                @endif
                                @endauth

                                <!-- Nama pengguna dan peran -->
                                <div>
                                @auth
                                @if (Auth::user()->role == 'admin')
                                    <span style="font-weight: bold; color: #394A5F;">{{ Auth::user()->username }}</span><br>
                                    <small>{{ ucfirst(Auth::user()->role) }}</small>
                                @endif
                                @endauth
                                @auth
                                @if (Auth::user()->role == 'siswa')
                                    <span style="font-weight: bold; color: #394A5F;">{{ Auth::user()->nama_panjang }}</span><br>
                                    <small>{{ ucfirst(Auth::user()->role) }}</small>
                                @endif
                                @endauth
                                </div>
                                <!-- Dropdown caret -->
                                <span class="caret ml-2"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @auth
    @if (Auth::user()->role == 'admin')
    <hr style="border: 0px solid #ccc; margin: 1.5px 0;">
    <nav class="navbar navbar-expand-md bg-white shadow-sm">
        <div class="container">
            <div class="header text-center mb-1">
                <ul class="navbar-nav ml-auto mt-1">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <i class="fas fa-home mr-1"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link {{ Route::is('kandidat') ? 'active' : '' }}" href="{{ route('kandidat') }}">
                            <i class="fas fa-users mr-1"></i> Kandidat
                        </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link {{ Route::is('listSiswa') ? 'active' : '' }}" href="{{ route('listSiswa') }}">
                            <i class="fas fa-user-check mr-1"></i> Pemilih
                        </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link {{ request()->is('hasilVote') ? 'active' : '' }}" href="/hasilVote">
                            <i class="fas fa-chart-bar mr-1"></i> Hasil
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @endif
    @endauth

        <main class="py-4">
            @yield('content')
        </main>
    </div>


</body>
</html>
