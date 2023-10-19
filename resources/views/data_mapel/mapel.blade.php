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
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    padding-left: 200px;
}

/* Gaya untuk kontainer tabel */
.table-container {
    max-width: 800px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Gaya untuk tabel */
.custom-table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #ddd;
    background-color: #fff;
}

/* Gaya untuk header tabel */
.custom-table th {
    background-color: #4f32bb;
    color: #fff;
    font-weight: bold;
    padding: 10px 20px;
    text-align: left;
}

/* Gaya untuk baris ganjil */
.custom-table tbody tr:nth-child(odd) {
    background-color: #f2f2f2;
}

/* Gaya untuk baris genap */
.custom-table tbody tr:nth-child(even) {
    background-color: #fff;
}

/* Gaya saat mengarahkan pointer ke baris tabel */
.custom-table tbody tr:hover {
    background-color: #002f61;
    color: #fff;
    cursor: pointer;
}

/* Gaya untuk sel data */
.custom-table td {
    padding: 10px 20px;
}
/* Gaya tombol tambah */
.add-button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.add-button:hover {
    background-color: #0056b3;
}
.btn-dark {
            background-color: #343a40;
            /* Warna latar belakang tombol */
            color: #ffffff;
            /* Warna teks tombol */
            transition: box-shadow 0.3s, transform 0.3s, color 0.3s;
            /* Efek transisi untuk bayangan, transformasi, dan warna teks */
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            /* Bayangan awal */
        }

        .btn-dark:hover {
            background-color: #ffffff;
            /* Warna latar belakang saat dihover */
            color: #343a40;
            /* Warna teks saat dihover */
            transform: scale(1.1);
            /* Perubahan ukuran saat dihover */
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.5);
            /* Bayangan saat dihover */
        }

        .btn-danger {
            background-color: #ff0000;
            /* Warna latar belakang tombol */
            color: #ffffff;
            /* Warna teks tombol */
            transition: box-shadow 0.3s, transform 0.3s, color 0.3s;
            /* Efek transisi untuk bayangan, transformasi, dan warna teks */
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            /* Bayangan awal */
        }

        .btn-danger:hover {
            background-color: #ffffff;
            /* Warna latar belakang saat dihover */
            color: #343a40;
            /* Warna teks saat dihover */
            transform: scale(1.1);
            /* Perubahan ukuran saat dihover */
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.5);
            /* Bayangan saat dihover */
        }


</style>

<body>

    <div class="table-container">
        <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i> Tambah</button>
        <table class="custom-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Guru</th>
                    <th>foto</th>

                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Tuti hastuti</td>
                    <td>gambar</td>
                    <td>
                        <div class="btn-group d-flex align-items-center" role="group">
                            <form class="d-flex" action="" method="post" style="width: 125px;">
                                @csrf
                                <a href="" class="btn btn-dark btn-sm me-2"><i class="fas fa-pencil-alt" style="margin-top: 8px"></i></a>
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="confirmDelete(event)"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

    <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="m odal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>


  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>

@endsection
