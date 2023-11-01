<?php

namespace App\Http\Controllers;

use App\Models\nama_guru;
use App\Models\Tugas;
use Illuminate\Http\Request;

class NamaGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = nama_guru::all(); // Ambil semua data guru dari basis data
        return view('data_guru.guru', compact('guru')); // Kirim data guru ke tampilan
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }



    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'mata_pelajaran' => 'required',
    ],[
        'nama.required' => 'Nama wajib diisi',
        'mata_pelajaran.required' => 'Mata Pelajaran wajib diisi'
    ]);

    nama_guru::create([
        'nama' => $request->input('nama'),
        'mata_pelajaran' => $request->input('mata_pelajaran'),
    ]);

    return redirect()->route('guru.index')->with('success', 'Data guru telah ditambahkan.');
}

    /**
     * Display the specified resource.
     */
    public function show(nama_guru $nama_guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(nama_guru $nama_guru)
    {
        return view('data_guru.edit', compact('nama_guru'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, nama_guru $nama_guru)
    {
        $request->validate([
            'nama' => 'required',
            'mata_pelajaran' => 'required',
        ]);

        $nama_guru->update([
            'nama' => $request->input('nama'),
            'mata_pelajaran' => $request->input('mata_pelajaran'),
        ]);

        return redirect()->route('guru.index')->with('success', 'Data guru telah diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        // Jika tidak terkait, hapus data guru
        // $nama_guru->delete();
        $guru = nama_guru::findOrFail($id);
        $tugas = tugas::where('guru_id',$guru->id)->count();
        if($tugas > 0){
            return redirect()->back()->with('error','data sedang digunakan');
        }else{
            $guru->delete();
        }

        return redirect()->route('guru.index')->with('success', 'Data guru telah dihapus.');
    }


}
