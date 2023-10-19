<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sidebar 02</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('navbar') }}/css/style.css">
</head>
<style>
    /* CSS untuk styling elemen formulir */
    body {
        background-color: #f2f2f2;
        font-family: 'Poppins', sans-serif;
    }

    .container {
        background-color: #fff;
        padding: 10px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h4 {
        font-weight: bold;
        color: #333;
    }

    .border-form {
        border: 1px solid #ddd;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 15px;
        background-color: #f9f9f9;
    }

    .input-text {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    select.input-text {
        width: 100%;
    }

    .text-danger {
        color: red;
    }

    .input-file {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        background-color: #f9f9f9;
    }

    .input-submit {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    .input-submit:hover {
        background-color: #0056b3;
    }
</style>

<body>
    <div class="container mt-4">
        <h4 class="text-center" style="font-family: 'Poppins', sans-serif; font-weight: bold; color:#fff;">Tambah Film</h4>
        <br>
        <div class="row">
            <div class="col-4">
                <div class="border-form">
                    <form action="{{ route('bahasa_indo') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" class="input-text" placeholder="Nama" value="{{ old('nama') }}">
                        @error('nama')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label for="tanggal">Tanggal</label>
                        <input type="text" id="tanggal" name="tanggal" class="input-text" placeholder="Tanggal"
                            value="{{ old('tanggal') }}">
                        @error('tanggal')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label for="cast">Cast</label>
                        <input type="text" id="cast" name="cast" class="input-text" placeholder="Cast"
                            value="{{ old('cast') }}">
                        @error('cast')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label for="minimal_usia">Minimal Usia</label>
                        <input type="number" id="minimal_usia" name="minimal_usia" class="input-text" placeholder="Minimal Usia"
                            min="0" value="{{ old('minimal_usia') }}">
                        @error('minimal_usia')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label for="status">Status</label>
                        <select name="status" id="status" class="input-text">
                            <option value="" disabled selected>Status</option>
                            <option value="nowplaying">Now Playing</option>
                            <option value="commingsoon">Coming Soon</option>
                        </select>
                        @error('status')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                </div>
            </div>

            <div class="col-4">
                <div class="border-form p-3">
                    <label for="durasi">Durasi</label>
                    <input type="number" id="durasi" name="durasi" class="input-text" placeholder="Durasi"
                        value="{{ old('durasi') }}">
                    @error('durasi')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <label for="jadwal_tayang">Jadwal Tayang</label>
                    <input type="date" id="jadwal_tayang" name="jadwal_tayang" class="input-text"
                        placeholder="Jadwal Tayang" value="{{ old('jadwal_tayang') }}">
                    @error('jadwal_tayang')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <label for="trailer">Link Video Trailer</label>
                    <input type="url" id="trailer" name="trailer" class="input-text" placeholder="Link Video Trailer"
                        value="{{ old('trailer') }}">
                    @error('trailer')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <label for="sinopsis">Sinopsis</label>
                    <textarea name="sinopsis" id="sinopsis" class="input-text" cols="30" rows="3"
                        placeholder="Sinopsis">{{ old('sinopsis') }}</textarea>
                    @error('sinopsis')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>



        <center>
            <br><br>
            <label for="thumbnail" style="color: #fff">Upload Thumbnail</label>
            <input type="file" id="thumbnail" name="thumbnail" accept="image/*" class="input-file" required
                style="width: 90%;">
            <button type="submit" class="input-submit" style="width: 90%;">Upload</button>
        </center>
        </form>
    </div>
</body>

</html>
