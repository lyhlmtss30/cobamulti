@extends('layouts.sidebar')

@section('sidebar')

<div class="container-fluid text-center" > <!-- Center the content -->
   <div  style="position: absolute; right: 100px; width: 70%;" class="table-content">
    <h1>Ulasan Siswa</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Pesan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($komentar as $komen)
            <tr>
                <td>{{ $komen->user->name }}</td>
                <td>{{ $komen->pesan }}</td>
                <td>
                    <form action="{{ route('komentaradmin.destroy', $komen->id) }}" method="post"  id="delete-form">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm" onclick="confirmDelete(event)">Delete</button>
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
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
   </div>
</div>

@endsection
