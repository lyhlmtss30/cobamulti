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

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tugas = Tugas::with(['nama_guru', 'data_mapel'])->paginate(5);
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
        'nama_siswa' => 'required',
        'mata_pelajaran' => 'required',
        'guru_pengajar' => 'required',
        'keterangan' => 'required',
        'bukti' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Inisialisasi $buktiPath dengan null
    $buktiPath = null;

    if ($request->hasFile('bukti')) {
        $buktiPath = $request->file('bukti')->store('buktis', 'public');
    }


    Tugas::create([
        'nama_siswa' => $validateData['nama_siswa'],
        'mapel_id' => $validateData['mata_pelajaran'],
        'guru_id' => $validateData['guru_pengajar'],
        'keterangan' => $validateData['keterangan'],
        'bukti' => $buktiPath, // Simpan $buktiPath dalam basis data
    ]);

    return redirect()->route('tugas.index')->with('success', 'Data tugas berhasil ditambahkan.');
}



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
    public function edit(tugas $tugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tugas $tugas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tugas $tugas)
    {
        //
    }
}
