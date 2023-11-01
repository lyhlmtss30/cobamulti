<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="icon" href="path_ke_ikon_favicon">
    <link rel="icon" href="favicon.ico">


    <title>Classtech User</title>
</head>
<style>
    /* Reset some default browser styles */
    body, ul {
        margin: 0;
        padding: 0;
    }

    /* Style for the navbar */
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: rgba(65, 120, 209, 0.9); /* Latar belakang transparan dengan warna RGBA */
        color: #fff;
        padding: 10px 0;
        z-index: 1000;
        box-shadow: 0 5px 8px rgba(2, 17, 236, 0.2); /* Menambahkan bayangan di bawah navbar */
        transition: background-color 0.10s; /* Transisi warna latar belakang saat digulir */
        border-top-left-radius: 40px; /* Menambahkan lengkungan di sudut atas navbar */
        border-top-right-radius: 40px; /* Menambahkan lengkungan di sudut atas navbar */
        border-bottom-left-radius: 40px; /* Menambahkan lengkungan di sudut bawah navbar */
        border-bottom-right-radius: 40px; /* Menambahkan lengkungan di sudut bawah navbar */
    }


    .navbar:hover {
        background-color: rgba(65, 120, 209, 1);
        transform: perspective(1px) translateY(-5px); /* Efek transformasi saat mouse hover */
    }

    /* Gaya untuk konten */
    main {
        padding-top: 80px;
    }

    .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Style for the logo */
    .logo {
        font-size: 24px;
        font-weight: bold;
        text-decoration: none;
        color: #fff;
    }

    /* Style for the navigation links */
    .nav-links {
        list-style: none;
        display: flex;
  color: #fff; /* Warna teks */
  padding: 1px 0;
  text-align: center;
  transition: background-color 0.3s;
    }

    .nav-links {
        margin-right: 20px;
    }

    .nav-links a{
        text-decoration: none;
        color: #fff;
        font-weight: bold;
        font-size: 25px;
        transition: color 0.3s;
  padding: 10px 10px;
  display: inline-block;
    }

    .nav-links a:hover {
        color: #a5a9ad;
    }

    /* Style for the "Logout" button */
    .btn-link.text-white {
        font-size: 20px;
        transition: color 0.3s;


    }
/* Efek garis bawah saat navbar dihover atau diaktif */
.navbar a:hover,
.navbar a:active {
  border-bottom: 3px solid #a5a9adff; /* Warna dan ukuran garis bawah saat dihover atau diaktif */
  transition: border-bottom 0.3s; /* Animasi saat garis bawah berubah */
}




</style>

<body>
    <nav class="navbar">
        <div class="container">
            <a href="#" class="logo">
                <img src="{{ asset('assets/images/anuk.png') }}" alt="" width="100" height="50">
            </a>
            <ul class="nav-links">
                <li><a href="{{ route('tugas.index') }}">Tugas</a></li>
                <li><a href="{{ route('komentar.index') }}">Ulasan</a></li>
            </ul>
            @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-link text-white">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
            @endauth
        </div>
    </nav>



            @yield('content')


</body>
</html>
