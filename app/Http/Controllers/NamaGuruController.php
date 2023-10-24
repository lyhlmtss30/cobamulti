<?php

namespace App\Http\Controllers;

use App\Models\nama_guru;
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

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required|string', // Menambahkan validasi bahwa 'email' harus berupa alamat email.
            'mata_pelajaran_yang_diajarkan' => 'required|string',
        ], [
             'nama_guru.required' => 'Nama guru wajib diisi',
             'mata_pelajaran_yang_diajarkan' => 'Mapel wajib Diisi '
        ]);
    }

    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'mata_pelajaran' => 'required',
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
    public function destroy(nama_guru $nama_guru)
    {
        $nama_guru->delete(); // Menghapus data guru berdasarkan ID atau objek model.

        return redirect()->route('guru.index')->with('success', 'Data guru telah dihapus.');
    }


}
