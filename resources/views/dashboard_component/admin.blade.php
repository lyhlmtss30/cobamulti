@extends('layouts.sidebar')
@section('sidebar')
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sidebar 02</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('navbar') }}/css/style.css">
</head>
<style>
   /* Gaya dasar */
/* Gaya dasar */
html {
  background-color: #c1c7d1;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
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
  font-size: 150px;
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
  width: 581px;
  height: 50%;
}

.btn {
  margin: 0 auto;
  width: 170px;
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

    <div class="table-container" style="width: 200%; height: 100%">

        <!-- Inspired by https://bert.house/en/-->
<div class="center">
    <h1>Welcome Admin!</h1>

  </div>





  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>

@endsection

