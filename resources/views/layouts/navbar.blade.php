<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Navbar Menarik</title>
</head>
<style>
    /* Reset some default browser styles */
    body, ul {
        margin: 0;
        padding: 0;
    }

    /* Style for the navbar */
    .navbar {
    position: fixed; /* Membuat navbar tetap di posisi atas */
    top: 0;
    left: 0;
    width: 100%;
    background-color: #27569c;
    color: #fff;
    padding: 10px 0;
    z-index: 1000; /* Menjamin navbar tetap di atas elemen lain */
}

/* Gaya untuk konten */
main {
    padding-top: 80px; /* Sesuaikan dengan tinggi navbar */
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
        display: flex; /* Menggunakan Flexbox */
    }

    .nav-links li {
        margin-right: 20px;
    }

    .nav-links a {
        text-decoration: none;
        color: #fff;
        font-weight: bold;
        transition: color 0.3s;
    }

    .nav-links a:hover {
        color: #007bff;
    }

</style>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="#" class="logo">classtech</a>
            <ul class="nav-links">
                <li><a href="{{ route('tugas.index') }}">Tugas</a></li>
                <li><a href="#">Ulasan</a></li>
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
    <main>

            @yield('content')

    </main>
</body>
</html>
