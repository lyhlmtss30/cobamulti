@extends('layouts.app')

@section('content')
    <!doctype html>
    <html lang="en">

    <head>
        <title>Sidebar 02</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('sidebar') }}/css/style.css">
    </head>

    <body>

        <div class="wrapper d-flex align-items-stretch">
            <nav id="sidebar">
                <div class="custom-menu">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                </div>
                <div class="p-4 pt-5">
                    <h1><a href="index.html" class="logo">Splash</a></h1>
                    <ul class="list-unstyled components mb-5">
                        <li class="active">
                            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Mata
                                Pelajaran</a>
                            <ul class="collapse list-unstyled" id="homeSubmenu">
                                <li>
                                    <a href="#">Jepang</a>
                                </li>
                                <li>
                                    <a href="#">Bahasa Inggris</a>
                                </li>
                                <li>
                                    <a href="#">Bahasa Indonesia</a>
                                </li>
                                <li>
                                    <a href="#">Fisika</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">About</a>
                        </li>
                        <li>
                            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle">Pages</a>
                            <ul class="collapse list-unstyled" id="pageSubmenu">
                                <li>
                                    <a href="#">Page 1</a>
                                </li>
                                <li>
                                    <a href="#">Page 2</a>
                                </li>
                                <li>
                                    <a href="#">Page 3</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Portfolio</a>
                        </li>
                        <li>
                            <a href="#">Contact</a>
                        </li>
                    </ul>

                    <div class="mb-5">
                        <h3 class="h6">Subscribe for newsletter</h3>
                        <form action="#" class="colorlib-subscribe-form">
                            <div class="form-group d-flex">
                                <div class="icon"><span class="icon-paper-plane"></span></div>
                                <input type="text" class="form-control" placeholder="Enter Email Address">
                            </div>
                        </form>
                    </div>

                    <div class="footer">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="icon-heart"
                                aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>

                </div>
            </nav>

            <div id="content" class="p-4 p-md-5 pt-5">

             
            <!-- Page Content  -->   <h2 class="mb-4">adminnn #02</h2>
				<a href="" type="button" class="btn btn-info">Tambah</a>
				<br><br><br>
                <table class="table table-success table-striped">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Nama</th>
							<th scope="col">tanggal</th>
							<th scope="col">keterangan</th>
							<th scope="col">bukti</th>
							<th scope="col">aksi</th>
						</tr>
					</thead>
                </table>
            </div>
        </div>

        <script src="{{ asset('sidebar') }}/js/jquery.min.js"></script>
        <script src="{{ asset('sidebar') }}/js/popper.js"></script>
        <script src="{{ asset('sidebar') }}/js/bootstrap.min.js"></script>
        <script src="{{ asset('sidebar') }}/js/main.js"></script>
    </body>

    </html>
@endsection
