@extends('layouts.navbar')

@section('content')
<style>
    /* Gaya dasar */
    html {
        background-color: #c1c7d1;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        height: 100%;
    }

    body {
        font-family: "Oswald", sans-serif;
        -webkit-font-smoothing: antialiased;
        font-smoothing: antialiased;
    }

    h1 {
        line-height: .95;
        color: #3629eb;
        font-weight: 900;
        font-size: 5rem; /* Mengubah ukuran font ke 5rem (atau ukuran yang Anda inginkan) */
        text-transform: uppercase;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        pointer-events: none;
    }
    h4 {
        line-height: .95;
        color: #242246;
        font-weight: 900;
        font-size: 2rem; /* Mengubah ukuran font ke 5rem (atau ukuran yang Anda inginkan) */
        text-transform: uppercase;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        pointer-events: none;
    }

    .center {
        position: absolute;
        margin: auto;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 50%; /* Mengubah width ke 50% (atau ukuran yang Anda inginkan) */
        height: 50%;
    }

    .btn {
        margin: 0 auto;
        width: 160px;
        height: 60px;
        padding: 6px 0 0 3px;
        border: 2px solid #66fcf1;
        border-radius: 2px;
        background: none;
        font-size: 16px;
        line-height: 54px;
        color: #fff;
        letter-spacing: .25em;
        text-decoration: none;
        font-weight: 600;
        text-transform: uppercase;
        vertical-align: middle;
        text-align: center;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        -webkit-transition: background .4s, color .4s;
        transition: background .4s, color .4s;
        cursor: pointer;
    }

    .btn:hover {
        background: #66fcf1;
        color: #10151B;
    }
</style>

<body>
    <div class="table-container" style="width: 100%; height: 100%">
        <div class="center">
            <h1>Selamat datang!</h1>
            <h4>Kumpulkan tugasmu sekarang juga!</h4>
        </div>
    </div>
</body>
@endsection
