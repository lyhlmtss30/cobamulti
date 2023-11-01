@extends('layouts.navbar')

@section('content')
<style>
    body {
        background-color: #d2cddf;
    }
    .form-floating label {
        font-size: 18px; /* Ukuran font label */
    }

    .form-floating textarea {
        background-color: #f5f5f5; /* Warna latar belakang textarea */
        border: 1px solid #ccc; /* Garis tepi textarea */
        padding: 10px; /* Padding dalam textarea */
    }

    .form-floating textarea:focus {
        border: 1px solid #007bff; /* Warna garis tepi saat textarea fokus */
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

    .container-fluid {
        padding: 20px; /* Padding untuk ruang ekstra di sekitar komentar */
    }

    .card {
        background-color: #fff; /* Warna latar belakang card */
        border: none;
        border-radius: 15px; /* Lengkungan sudut card */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Bayangan card */
    }

    .card-title {
        font-size: 20px; /* Ukuran font judul card */
    }

    .card-text {
        font-size: 16px; /* Ukuran font teks dalam card */
    }


    .btn-danger {
  background-color: #fc4d09; /* Warna latar belakang tombol */
  color: #fff; /* Warna teks */
  border: none;
  padding: 8px 16px;
  border-radius: 5px;
  transition: background-color 0.3s;
}
rgb(255, 81, 0)rgb(255, 30, 0)
.btn-danger:hover {
  background-color: #52677e; /* Warna latar belakang saat dihover */
  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Efek bayangan saat dihover */
  transform: scale(1.30); /* Perubahan skala saat dihover */
}

/* Optional: Hover effect on the icon */
.btn-danger i:hover {
  color: #b66868; /* Warna ikon saat dihover */
}
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="container mb-3" style="margin-top: 80px;">
    <form class="w-100 d-flex" action="{{ route('komentar.store') }}" method="post">
        @csrf
        <div class="row w-100">
            <div class="col-md-10">
                <div class="form-floating">
                    <label for="floatingTextarea"></label>
                    <textarea name="pesan" class="form-control" placeholder="Tinggalkan Komentar Disini.." id="floatingTextarea"></textarea>
                </div>
            </div>
            <div class="col-md-2 " style="margin-top: 3%;">
                <button type="submit" class="btn btn-primary animated-button">
                    <p>Kirim</p>
                </button>
            </div>
        </div>
    </form>
</div>
<div class="container-fluid">
    <div class="row">
        @foreach ($komentar as $komentar)
        <div class="col-md-4 mb-3">
            <div class="card rounded-circle shadow"> <!-- Menambahkan class rounded-circle dan shadow -->
                <div class="card-body d-flex justify-content-between" style="background-color: rgb(255, 255, 255)">
                    <div class="kiri">
                        <h5 class="card-title">{{ $komentar->user->name }}</h5>
                        <p class="card-text">{{ $komentar->pesan }}</p>
                    </div>
                    <div class="kanan">
                        @if(Auth::user()->id === $komentar->user_id)
                            <form action="{{ route('komentar.destroy', $komentar->id) }}" method="post" id="delete-form">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" onclick="confirmDelete(event)">Delete</button>
                            </form>

                            {{-- swal confirm --}}
                            <script>
                                function confirmDelete(event) {
                                    event.preventDefault(); // Mencegah default submit form

                                    Swal.fire({
                                        title: 'Apakah Anda yakin?',
                                        text: 'Anda akan menghapus komentar ini.',
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

                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
