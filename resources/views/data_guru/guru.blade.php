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

   /* Gaya untuk kontainer tabel */
.table-container {
    width: 200%; /* Mengatur lebar penuh */
    background-color: #fff;
    padding: 30px;
    margin-left: 30px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
/* ox-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */



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
            background-color: #ccc5c5;
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

        /* Gaya untuk teks yang di-highlight */
.highlight {
    color: #49256b; /* Warna teks yang menonjol */
    font-weight: bold;
    font-size: 38px; /* Ukuran huruf yang lebih besar */
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

}
/* Gaya untuk tombol Edit yang diperkecil */
.small-edit-button {
    padding: 5px 10px; /* Sesuaikan ukuran padding sesuai preferensi Anda */
    font-size: 14px; /* Sesuaikan ukuran font sesuai preferensi Anda */
}



</style>

<body>



    <div class="table-container">
        <h3><span class="highlight">Tambahkan Nama Anda Jika Belum Terdaftar!</span></h3>
        <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i> Tambah</button>
        <br><br>
        <table class="custom-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Guru</th>
                    <th>Mata Pelajaran</th>

                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guru as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->mata_pelajaran }}</td>
                            <td>
                                <div class="btn-group d-flex align-items-center" role="group">
                                    <!-- Tombol Edit -->
                                    <a href="#" class="btn btn-dark btn-sm me-4 small-edit-button" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                        <i class="fas fa-pencil-alt" style="margin-top: 2px"></i> Edit
                                    </a>
                                    <!-- Tombol Hapus -->
                                    <form class="d-flex" action="{{ route('guru.destroy', $item->id) }}" method="POST" id="delete-form" style="width: 125px">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="confirmDelete(event)">
                                            <i class="fas fa-trash-alt" ></i> Hapus
                                        </button>
                                    </form>
                                    {{-- swal confirm --}}
                            <script>
                                function confirmDelete(event) {
                                    event.preventDefault(); // Mencegah default submit form

                                    Swal.fire({
                                        title: 'Apakah Anda yakin?',
                                        text: 'Anda akan menghapus data ini.',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonText: 'Ya, Hapus',
                                        cancelButtonText: 'Batal'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // Jika pengguna mengonfirmasi, lanjutkan dengan penghapusan
                                            document.getElementById('delete-form').submit();
                                        }
                                    });
                                }
                            </script>
                            {{-- swal confirm --}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



    <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('guru.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Guru</label>
                        <input type="text" class="form-control" id="nama" name="nama" >
                    </div>
                    <div class="mb-3">
                        <label for="mata_pelajaran" class="form-label">Mata Pelajaran yang Diajarkan</label>
                        <input type="text" class="form-control" id="mata_pelajaran" name="mata_pelajaran" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Edit Guru -->
@foreach ($guru as $item)
<div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Data Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('guru.update', $item->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="edit_nama{{ $item->id }}" class="form-label">Nama Guru</label>
                        <input type="text" class="form-control" id="edit_nama{{ $item->id }}" name="nama" value="{{ $item->nama }}" required>

                    </div>
                    <div class="mb-3">
                        <label for="edit_mata_pelajaran{{ $item->id }}" class="form-label">Mata Pelajaran yang Diajarkan</label>
                        <input type="text" class="form-control" id="edit_mata_pelajaran{{ $item->id }}" name="mata_pelajaran" value="{{ $item->mata_pelajaran }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach


  </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@if ($errors->any())
<script>
    $(document).ready(function() {
        @foreach($errors->all() as $error)
        toastr.error('{{ $error }}', 'Error', {
            closeButton: true, // Menambahkan tombol hapus
            timeOut: 0
        });
        @endforeach
    });
</script>
@endif
</html>

@endsection

