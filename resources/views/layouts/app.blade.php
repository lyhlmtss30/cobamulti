<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<style>/* Reset some default browser styles */
    /* Reset some default browser styles */
body, ul {
    margin: 0;
    padding: 0;
}

/* Style for the navbar */
.navbar {
    background-color: #007bff; /* Warna biru yang menarik */
    color: #fff;
    padding: 10px 0;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Efek bayangan di bawah navbar */
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
}

.nav-links li {
    display: inline;
    margin-right: 20px;
}

.nav-links a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
    transition: color 0.3s;
}

.nav-links a:hover {
    color: #ffed00; /* Warna kuning saat dihover */
}

/* Style untuk menu dropdown */
.dropdown-menu {
    background-color: #007bff;
    color: #fff;
}

.dropdown-item {
    color: #fff;
}

.dropdown-item:hover {
    background-color: #0056b3; /* Warna biru saat dihover */
    color: #fff;
}

    </style>
<body>
    <div id="app">
        <nav class="navbar">
            <div class="container">
                <a href="#" class="logo">Brand</a>
                <ul class="nav-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Portfolio</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </nav>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
