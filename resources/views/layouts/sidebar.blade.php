<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Admin Classtech

    </title>

    <style>
        /* Style untuk sidebar */
        .sidenav {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #3f51b5;
            padding-top: 20px;
            transition: width 0.5s; /* Animasi perubahan lebar saat dibuka atau ditutup */
        }

        .sidenav a {
            padding: 15px 20px;
            text-decoration: none;
            font-size: 16px;
            color: #fff;
            display: block;
            transition: all 0.3s;
        }

        .sidenav a:hover {
            background-color: #232d5b;
        }

        .sidenav a.active {
            background-color: #232d5b; /* Warna untuk menu yang aktif */
        }

        /* Style untuk tombol logout */
        .logout-button {
            margin: 20px;
            padding: 10px 20px;
            background-color: #443232;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .logout-button:hover {
            background-color: #b39f9e;
        }

        /* Style untuk judul sidebar */
        .sidebar-title {
            font-size: 24px;
            color: #fff;
            text-align: center;
            margin-top: 0;
            padding: 10px 0;
            font-weight: bold;
        }

        /* Logo styling */
        .logo {
            text-align: center;
        }

        .logo img {
            max-width: 80px;
            border-radius: 50%;
        }

        /* Admin avatar */
        .admin-avatar img {
            max-width: 50px;
            border-radius: 50%;
            margin: 10px 0;
        }

        /* Add any other styles you want */
    </style>


</head>
<body>

<div class="sidenav">
    <h2 class="sidebar-title">Dashboard</h2>


    <a href="{{ route('guru.index') }}"
    class="{{ request()->is('guru') ? 'active' : '' }}">
        <i class="bi bi-people-fill"></i> data guru
    </a>

    <a href="{{ route('mapel') }}"
    class="{{ request()->is('data_mapel.index') ? 'active' : '' }}">
    <i class="bi bi-journal-text"></i> Data Mapel</a>

    <a href="{{ route('mapelIndonesia') }}"
    class="{{ request()->is('mapelIndonesia') ? 'active' : '' }}">
    <i class="fas fa-language"></i> Mapel Indonesia</a>

    <a href="{{ route('mapelAgama') }}"
    class="{{ request()->is('mapelAgama') ? 'active' : '' }}">
    <i class="bi bi-moon-stars-fill"></i> Mapel Agama</a>

    <a href="{{ route('mapelMatematika') }}"
    class="{{ request()->is('mapelMatematika') ? 'active' : '' }}">
    <i class="bi bi-plus-slash-minus"></i> Mapel matematika</a>

    {{-- <a href="{{ route('mapelMatematika') }}"
    class="{{ request()->is('mapelMatematika') ? 'active' : '' }}">
    <i class="fas fa-language"></i> Mapel matematika</a> --}}

    <a href="{{ route('komentaradmin.index') }}"
    class="{{ request()->is('komentaradmin') ? 'active' : '' }}">
    <i class="bi bi-chat-left-text-fill"></i> Komentar Siswa</a>



    <button class="logout-button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt"></i> Logout
    </button>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>


<div class="container">
    <main>
        <div class="d-flex px-5">
            @yield('sidebar')
        </div>
    </main>
</div>

</body>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-slash-minus" viewBox="0 0 16 16">
    <path d="m1.854 14.854 13-13a.5.5 0 0 0-.708-.708l-13 13a.5.5 0 0 0 .708.708ZM4 1a.5.5 0 0 1 .5.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2A.5.5 0 0 1 4 1Zm5 11a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5A.5.5 0 0 1 9 12Z"/>
  </svg>
</html>

