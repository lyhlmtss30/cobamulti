<?php

namespace App\Http\Controllers;

use App\Models\data_mapel;
use App\Models\nama_guru;
use App\Models\nama_mapel;
use App\Models\tugas;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth; // Import class Auth
use Illuminate\Support\Facades\Storage;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user()->id;// user beda beda setiap id
        $tugas = Tugas::with(['nama_guru', 'data_mapel'])->where('user_id', $user)->paginate(5);
        $nama_guru = nama_guru::all();
        $nama_mapel = data_mapel::all();

        return view('dashboard_component.bahasa_indo', compact('tugas', 'nama_mapel', 'nama_guru'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validateData = $request->validate([
        'mata_pelajaran' => 'required',
        'guru_pengajar' => 'required',
        'keterangan' => 'required',
        'bukti' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ],[
        'nama_siswa.required' => 'Nama Siswa wajib diisi',
        'mata_pelajaran.required' => 'Mata pelajaran wajib diisi',
        'guru_pengajar.required' => 'Guru Pengajar wajib diisi',
        'keterangan.required' => 'Keterangan wajib diisi',
        'bukti.required' => 'bukti wajib diisi'
    ]);

    // Inisialisasi $buktiPath dengan null
    $buktiPath = null;

    if ($request->hasFile('bukti')) {
        $buktiPath = $request->file('bukti')->store('buktis', 'public');
    }

    $user = auth()->user()->id;

    Tugas::create([
        'nama_siswa' => Auth::user()->name,
        'user_id' => $user,
        'mapel_id' => $validateData['mata_pelajaran'],
        'guru_id' => $validateData['guru_pengajar'],
        'keterangan' => $validateData['keterangan'],
        'bukti' => $buktiPath, // Simpan $buktiPath dalam basis data
    ]);

    return redirect()->route('tugas.index')->with('success', 'Data tugas berhasil ditambahkan.');
}

//     public function search(Request $request)
// {
//     $user = Auth::id();
//     $search = $request->input('search');

//     $tugas = Tugas::with(['nama_guru', 'data_mapel'])
//         ->where('user_id', $user)
//         ->where(function ($query) use ($search) {
//             $query->where('nama_siswa', 'like', '%' . $search . '%')
//                 ->orWhereHas('nama_mapel', function ($query) use ($search) {
//                     $query->where('nama_mapel', 'like', '%' . $search . '%');
//                 })
//                 ->orWhereHas('nama_guru', function ($query) use ($search) {
//                     $query->where('nama', 'like', '%' . $search . '%');
//                 });
//         })
//         ->paginate(5);

//     $nama_guru = nama_guru::all();
//     $nama_mapel = data_mapel::all();

//     return view('dashboard_component.bahasa_indo', compact('tugas', 'nama_mapel', 'nama_guru'));
// }



    /**
     * Display the specified resource.
     */
    public function show(tugas $tugas)
    {
        return view('dashboard_component.bahasa_indo', compact('tugas'));

    }

    /**
     * Show the form for editing the specified resource.
     */

     //ini untuk aproval
     public function tolak($id)
     {
         $data = tugas::FindOrFail($id);
         $data->update([
             'status' => 'ditolak'
         ]);
         return redirect()->back()->with('alert', 'Tugas telah ditolak.');
     }

     public function update($id)
     {
         $data = tugas::FindOrFail($id);
         $data->update([
             'status' => 'diterima'
         ]);
         return redirect()->back()->with('alert', 'Tugas telah diterima.');
     }


     public function updates(Request $request, Tugas $tugas)
     {
         // Cek apakah tugas sudah ada dalam database
         if ($tugas) {
             $validateData = $request->validate([
                 'mata_pelajaran' => 'required',
                 'guru_pengajar' => 'required',
                 'keterangan' => 'required',
                 'bukti' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
             ], [
                 'nama_siswa.required' => 'Nama Siswa wajib diisi',
                 'mata_pelajaran.required' => 'Mata pelajaran wajib diisi',
                 'guru_pengajar.required' => 'Guru Pengajar wajib diisi',
                 'keterangan.required' => 'Keterangan wajib diisi',
                 'bukti.image' => 'Bukti harus berupa gambar',
                 'bukti.mimes' => 'Bukti harus berformat jpeg, png, jpg, atau gif',
                 'bukti.max' => 'Ukuran bukti maksimal 2 MB',
             ]);

             $buktiPath = $tugas->bukti; // Simpan bukti lama

             if ($request->hasFile('bukti')) {
                 // Upload bukti baru
                 $buktiPath = $request->file('bukti')->store('buktis', 'public');

                 // Hapus bukti lama jika ada
                 if ($tugas->bukti) {
                     Storage::disk('public')->delete($tugas->bukti);
                 }
             }

             $user = auth()->user()->id;

             // Perbarui informasi tugas tanpa memeriksa status
             $tugas->update([
                'nama_siswa' => Auth::user()->name,
                'user_id' => $user,
                'mapel_id' => $validateData['mata_pelajaran'],
                'guru_id' => $validateData['guru_pengajar'],
                'keterangan' => $validateData['keterangan'],
                'bukti' => $buktiPath, // Simpan $buktiPath dalam basis data
                'status' => ($tugas->status == 'ditolak') ? 'mengajukan ulang' : $tugas->status,
            ]);

             return back()->with('success', 'Data tugas berhasil diperbarui.');
         } else {
             return redirect()->route('tugas.index')->with('info', 'Tugas tidak ditemukan.');
         }
     }


public function search(Request $request)
{
    $user = Auth::id();
    $search = $request->input('search');

    $tugas = Tugas::with(['nama_guru', 'data_mapel'])
        ->where('user_id', $user)
        ->whereHas('data_mapel', function ($query) use ($search) {
            $query->where('nama_mapel', 'like', '%' . $search . '%');
        })
        ->paginate(5);

    $nama_guru = nama_guru::all();
    $nama_mapel = data_mapel::all();

    return view('dashboard_component.bahasa_indo', compact('tugas', 'nama_mapel', 'nama_guru'));
}




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tugas $tugas)
    {
        //
    }
}
