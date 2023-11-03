@extends('layouts.navbar')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sidebar 02</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('navbar') }}/css/style.css">
</head>
<style>
    /* Gaya dasar */
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
    }

    /* Gaya untuk kontainer tabel */
    .table-container {
        margin: 0;
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
        transform: rotate(45deg) scale(1.2);
    }

    /* Tambahkan CSS untuk paginate */
    .pagination {
        justify-content: center;
        margin-top: 20px;
    }

    .animated-button {
  position: relative;
  background-color: #007BFF; /* Warna latar belakang tombol */
  color: #fff; /* Warna teks */
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  overflow: hidden;
  transition: background-color 0.3s, transform 0.3s;
}

.animated-button i {
  margin-right: 5px; /* Jarak antara ikon dan teks */
}

.animated-button:hover {
  background-color: #0056b3; /* Warna latar belakang saat dihover */
  transform: scale(1.05); /* Perubahan skala saat dihover */
}

.animated-button::after {
  content: "";
  position: absolute;
  top: 50%;
  left: 50%;
  width: 100%;
  height: 100%;
  background: rgba(255, 255, 255, 0.1);
  transform: scale(0, 0);
  transform-origin: center;
  transition: transform 0.7s;
}

.animated-button:hover::after {
  transform: scale(3, 3);
}

/* Optional: Hover effect on the icon */
.animated-button i:hover {
  color: #dad0d0; /* Warna ikon saat dihover */
}
.edit-button {
  background-color: #007BFF; /* Warna latar belakang tombol */
  color: #fff; /* Warna teks */
  border: none;
  padding: 8px 16px;
  border-radius: 5px;
  transition: background-color 0.3s;
}

.edit-button:hover {
  background-color: #52677e; /* Warna latar belakang saat dihover */
  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Efek bayangan saat dihover */
  transform: scale(1.30); /* Perubahan skala saat dihover */
}

/* Optional: Hover effect on the icon */
.edit-button i:hover {
  color: #f8f8f8; /* Warna ikon saat dihover */
}


</style>

<body>
    <div class="py-2 font-semibold">
        <span class="text-xl mb-4" style="font-weight: 700; font-size:30px; text-align:left; margin-top:-40px; font-family:Verdana, Geneva, Tahoma, sans-serif">
            Tugas / <span style="color: rgb(87, 166, 255);">{{ auth()->user()->name }}</span>
        </span>
    </div>

    <div class="table-container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <button type="button" class="btn btn-primary animated-button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa fa-plus"></i> Tambah Tugas
            </button>
            <form action="{{ route('tugas.search') }}" method="GET" class="col-md-3">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Cari nama mapel" value="{{ old('search') }}">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </form>
        </div>

        <table class="custom-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Mapel</th>
                    <th>Nama Guru</th>
                    <th>Keterangan</th>
                    <th>Bukti</th>
                    <th>status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tugas as $t)
                <tr>
                    <td>{{ $t->nama_siswa }}</td>
                    <td>{{ $t->data_mapel->nama_mapel }}</td>
                    <td>{{ $t->nama_guru->nama }}</td>
                    <td>{{ $t->keterangan }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $t->bukti) }}" alt="Gambar" width="90" height="80">
                    </td>
                    <td>{{ $t->status }}</td>
                    <td>@if ($t->status == 'menunggu' || $t->status == 'ditolak')
                        <button data-bs-toggle="modal" data-bs-target="#edit{{ $t->id }}"
                            class="bbtn btn-primary edit-button">Edit</button>
                    @endif</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Tambahkan paginate di sini -->
        <div class="pagination">
            {{ $tugas->links('pagination::bootstrap-5') }}
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Tugas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ Route('tugas.store') }}" enctype="multipart/form-data">
                        @csrf


                        <div class="mb-3">
                            <label for="mata_pelajaran">Nama mapel</label>
                            <select class="form-select" id="mata_pelajaran" name="mata_pelajaran" >
                                <option value="">Pilih Mata Pelajaran</option>
                                @foreach ($nama_mapel as $mapel)
                                    <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nama_guru">Nama Guru</label>
                            <select class="form-select" id="nama_guru" name="guru_pengajar" >
                                <option value="">Pilih Guru</option>
                                @foreach ($nama_guru as $guru)
                                    <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" >
                        </div>
                        <div class="mb-3">
                            <label for="bukti">Bukti</label>
                            <input type="file" class="form-control" id="bukti" name="bukti" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>


            </div>
        </div>
    </div>

    {{-- untuk modal edit --}}
    @foreach ($tugas as $tugas)
    <div class="modal fade" id="edit{{ $tugas->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Tugas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('tugas.updates', $tugas->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="mata_pelajaran">Nama mapel</label>
                            <select class="form-select" id="mata_pelajaran" name="mata_pelajaran" >
                                <option value="">Pilih Mata Pelajaran</option>
                                @foreach ($nama_mapel as $mapel)
                                <option value="{{ $mapel->id }}"
                                    {{ old('mata_pelajaran', $tugas->mapel_id) == $mapel->id ? 'selected' : '' }}>
                                    {{ $mapel->nama_mapel }}
                                </option>
                                @endforeach
                            </select>
                    </div>

                        <div class="mb-3">
                            <label for="nama_guru">Nama Guru</label>
                            <select class="form-select" id="nama_guru" name="guru_pengajar" >
                                <option value="">Pilih Guru</option>
                                @foreach ($nama_guru as $guru)
                                <option value="{{ $guru->id }}"
                                    {{ old('guru_pengajar', $tugas->guru_id) == $guru->id ? 'selected' : '' }}>
                                    {{ $guru->nama }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ old('keterangan', $tugas->keterangan) }}">
                        </div>

                        <div class="mb-3">
                            <label for="bukti">Bukti</label>
                            <input type="file" class="form-control" id="bukti" name="bukti">
                            <div>
                                <p><strong>Gambar Sebelumnya:</strong></p>
                                <img src="{{ asset('storage/' . $tugas->bukti) }}" id="old-image" alt="Gambar Lama" width="90" height="80">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">\
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <!-- ... -->

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@if ($errors->any())
<script>
     // Fungsi untuk menampilkan gambar lama saat modal dibuka
     function displayOldImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#old-image').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Menangani perubahan pada input gambar
    $('#bukti').change(function() {
        displayOldImage(this);
    });

    // Saat modal edit dibuka, tampilkan gambar lama
    $('#edit{{ $tugas->id }}').on('shown.bs.modal', function() {
        displayOldImage($('#bukti'));
    });
    $(document).ready(function() {
        @foreach($errors->all() as $error)
        toastr.error('{{ $error }}', 'Error', {
            closeButton: true,
            timeOut: 0
        });
        @endforeach
    });
</script>
@endif

</html>
@endsection
