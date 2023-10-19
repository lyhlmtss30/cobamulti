<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Sidebar dengan Logout</title>

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

        /* Style untuk tombol logout */
        .logout-button {
            margin: 20px;
            padding: 10px 20px;
            background-color: #8d1818;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .logout-button:hover {
            background-color: #aa5751;
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
    </style>
</head>
<body>

<div class="sidenav">
    <h2 class="sidebar-title">Dashboard</h2>

    <a href="#"><i class="fas fa-user"></i> Profil</a>

    <a href="{{ route('bahasa_indo') }}"
    class="{{ request()->is('bahasa_indo') ? 'active' : '' }}">
        <i class="fas fa-language "></i> Bahasa Indonesia
    </a>

    <a href="{{ route('guru') }}"
    class="{{ request()->is('guru') ? 'active' : '' }}">
        <i class="fas fa-language "></i> data guru
    </a>

    <a href="{{ route('mapel') }}"
    class="{{ request()->is('mapel') ? 'active' : '' }}">
    <i class="fas fa-language"></i> Data Mapel</a>

    <a href="#"><i class="fas fa-language"></i> Bahasa Jepang</a>

    <a href="#"><i class="fas fa-language"></i> Bahasa Inggris</a>

    <a href="#"><i class="fas fa-language"></i> Bahasa Jawa</a>

    <a href="#"><i class="fas fa-cog"></i> Pengaturan</a>

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
</html>
